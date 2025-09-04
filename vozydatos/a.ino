#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <WiFi.h>
#include <ThingSpeak.h>
#include <UbidotsEsp32Mqtt.h>

#define LDR_PIN 34
#define FLAME_PIN 35
#define TRIG_PIN 12
#define ECHO_PIN 14
#define HUMEDAD_PIN 13  // Pin para el sensor de humedad (analógico)

// Configura tu API Key de ThingSpeak
const char *myWriteAPIKey = "5E0FJI7K1HTT3Q9O";  // Sustituye con tu API Key
const char *ssid = "Pixel";  // Nombre de la red Wi-Fi (Pixel)
const char *password = "";   // Red sin contraseña
#define UBIDOTS_TOKEN "BBUS-LDyXA8Lot7PoFRAt0ywmCJj0klTilL"
#define DEVICE_LABEL "esp32"
#define VARIABLE_DISTANCIA "distance"
#define VARIABLE_FLAMA "flama"
#define VARIABLE_HUM "humedad"
#define VARIABLE_LUZ "luz"
// Declaramos la instancia de Ubidots (asignando el token)
Ubidots ubidots(UBIDOTS_TOKEN);
WiFiClient client;

LiquidCrystal_I2C lcd(0x27, 16, 2);  // Dirección del LCD
long duration;
int distance;

void setup() {
  Serial.begin(115200);

  // LCD
  Wire.begin(21, 22);  // SDA = 21, SCL = 22
  lcd.begin(16, 2);
  lcd.backlight();
  lcd.print("Iniciando...");

  // Pines
  pinMode(TRIG_PIN, OUTPUT);
  pinMode(ECHO_PIN, INPUT);
  pinMode(HUMEDAD_PIN, INPUT);  // Configura el pin de humedad como entrada
  // Conexión a Wi-Fi
  Serial.println("Conectando a Wi-Fi...");
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }
  Serial.println("Conectado a Wi-Fi");

  ThingSpeak.begin(client);  // Inicializa ThingSpeak

  // Iniciar Ubidots
  ubidots.setup();  // Configuración de Ubidots (ajuste de MQTT)
  ubidots.reconnect();  // Reconecta si es necesario

  Serial.println("Conectado a Ubidots");
}

void loop() {
    if (!ubidots.connected()) {
    ubidots.reconnect();  // Verifica la conexión con Ubidots
  }
  ubidots.loop();  // Necesario para mantener la suscripción activa
  // LDR
  int luz = analogRead(LDR_PIN);

  // Sensor de flama
  int flama = analogRead(FLAME_PIN);

  // Sensor de humedad (valor analógico)
  int humedad = analogRead(HUMEDAD_PIN);  // Lee el valor analógico de humedad

  // HC-SR04
  digitalWrite(TRIG_PIN, LOW);
  delayMicroseconds(2);
  digitalWrite(TRIG_PIN, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIG_PIN, LOW);
  long duracion = pulseIn(ECHO_PIN, HIGH);
  float distancia = duracion * 0.034 / 2;

  // Verifica que la duración no sea 0
  if (duration == 0) {
    Serial.println("Error: No se detectó distancia.");
    distance = 0;
  } else {
    // Calcula la distancia en centímetros
    distance = duration * 0.034 / 2;
  }

  // Mostrar en LCD
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Luz:");
  lcd.print(luz);
  lcd.setCursor(0, 1);
  lcd.print("Dist:");
  lcd.print(distancia);
  lcd.print("cm");

  // Mostrar el valor de humedad en el LCD
  lcd.setCursor(0, 1);
  lcd.print("Humedad: ");
  lcd.print(humedad);  // Mostrar el valor analógico de humedad

  // Serial
  Serial.print("Luz: "); Serial.print(luz);
  Serial.print(" | Flama: "); Serial.print(flama);
  Serial.print(" | Distancia: "); Serial.print(distancia); Serial.println(" cm");
  Serial.print("Humedad: "); Serial.println(humedad);

  // Enviar a Ubidots
  if (!isnan(luz) && !isnan(humedad)) {
    // Usamos el método add() de Ubidots para agregar las variables
    ubidots.add(VARIABLE_DISTANCIA, distance);
    ubidots.add(VARIABLE_HUM, humedad);
    ubidots.add(VARIABLE_LUZ, luz);
    ubidots.add(VARIABLE_FLAMA, flama);

    // Publicar los datos a Ubidots
    ubidots.publish(DEVICE_LABEL);  // Enviar los datos a Ubidots
    Serial.println("Datos enviados a Ubidots");
  }
  // Enviar datos a ThingSpeak (para mantener ambos sistemas funcionando)
  ThingSpeak.setField(1, distance);  // Campo 1: distancia
  ThingSpeak.setField(2, luz);        // Campo 2: luz
  int x = ThingSpeak.writeFields(3008099, myWriteAPIKey);  // Reemplaza 123456 con tu canal ID
  if (x == 200) {
    Serial.println("Datos enviados a ThingSpeak");
  } else {
    Serial.println("Error al enviar datos a ThingSpeak");
  }
  delay(1000);
}
