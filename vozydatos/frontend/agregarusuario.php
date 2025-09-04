<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Voz y Datos – Crear Usuario</title>

<style>
/* ——— Reset & layout ——— */
*{box-sizing:border-box}
body,html{margin:0;height:100%;font-family:'Segoe UI',Tahoma,Verdana,sans-serif;background:#f0f2f5}

/* ——— Sidebar ——— */
nav{position:fixed;top:0;left:0;bottom:0;width:220px;background:#6c63ff;color:#fff;padding:30px 20px;display:flex;flex-direction:column}
nav h2{margin:0 0 30px;font-weight:700;font-size:1.8rem;display:flex;align-items:center;gap:12px;line-height:1.2;height:90px}
nav h2 .logo{width:90px;height:90px;object-fit:contain}
nav ul{list-style:none;padding:0;margin:0 0 30px;width:100%}
nav ul li{margin-bottom:15px;width:100%}
nav ul li button,nav ul li a.button-link{width:100%;padding:10px 15px;background:#7f73f8;border:none;border-radius:6px;color:#fff;font-weight:600;font-size:1rem;cursor:pointer;text-align:left;display:flex;justify-content:space-between;align-items:center;transition:.3s}
nav ul li button:hover,nav ul li a.button-link:hover{background:#5a4cd1}
nav ul li button.active,nav ul li a.button-link.active{background:#4a39b8}
.arrow{border:solid #fff;border-width:0 2px 2px 0;padding:4px;margin-left:10px;transition:.3s}
.arrow.down{transform:rotate(45deg)}
.arrow.right{transform:rotate(-45deg)}
.submenu{margin-top:8px;margin-left:10px;background:#5549b1;border-radius:6px;padding:8px 0;display:none;flex-direction:column}
.submenu.show{display:flex}
.submenu a{color:#fff;padding:6px 15px;text-decoration:none;font-size:.9rem;font-weight:500}
.submenu a:hover{background:#463b9e}
.logout{cursor:pointer;font-weight:600;color:#eee;padding:10px 15px;border-radius:6px;background:#7f73f8;transition:.3s;margin-top:auto}
.logout:hover{background:#5a4cd1}

/* ——— Main ——— */
.content{margin-left:220px;padding:30px 40px;min-height:100vh;max-width:calc(100% - 240px)}
h1{margin-top:0;font-weight:700;font-size:2.2rem;color:#333}
.section{background:#fff;padding:20px 25px;border-radius:8px;box-shadow:0 3px 12px rgb(0 0 0 / .1)}
label{font-weight:600;margin-bottom:6px;display:block;color:#333}

/* ——— Formulario ——— */
form{display:grid;grid-template-columns:180px 1fr 180px 1fr;gap:15px 30px;align-items:center;margin-top:20px;width:100%}
input[type=text],input[type=password],select{width:100%;padding:8px 12px;border-radius:4px;border:1px solid #ccc;font-size:1rem}
input[type=radio]{margin-right:8px}
.radio-group{display:flex;gap:20px;grid-column:2 / 3}
.submit-button{grid-column:4 / 5;justify-self:start;padding:8px 20px;background:#6c63ff;color:#fff;font-weight:600;border:none;border-radius:6px;cursor:pointer;transition:.3s}
.submit-button:hover{background:#574bcf}
</style>
</head>
<body>

<nav>
  <h2><img src="logo.png" class="logo" alt="Logo">Voz y Datos</h2>

  <ul>
    <li>
      <button id="btnGestionUsuarios">
        Gestionar Usuarios
        <i class="arrow right" id="arrowGestionUsuarios"></i>
      </button>
      <div id="submenuGestionUsuarios" class="submenu">
        <a href="agregarusuario.php">Agregar usuario</a>
        <a href="listarusuario.php">Listar usuario</a>
      </div>
    </li>

    <li>
      <button id="btnGestionDashboards">
        Gestionar Dashboards
        <i class="arrow right" id="arrowGestionDashboards"></i>
      </button>
      <div id="submenuGestionDashboards" class="submenu">
        <a href="agregardashboard.php">Agregar Dashboard</a>
        <a href="asignardashboard.php">Asignar Dashboard</a>
      </div>
    </li>

    <li>
      <button id="btnGestionCoordinadores">
        Gestionar Coordinadores
        <i class="arrow right" id="arrowGestionCoordinadores"></i>
      </button>
      <div id="submenuGestionCoordinadores" class="submenu">
        <a href="listarcoordinador.php">Listar Coordinadores</a>
      </div>
    </li>
  </ul>

  <a href="index.html" class="logout" id="logoutLink">Cerrar sesión</a>
</nav>

<div class="content">
  <h1>Crear Usuario</h1>

  <div class="section">
    <form id="formCrearUsuario">
      <label for="nombres">Nombres:</label>
      <input type="text" id="nombres" name="nombres">

      <label for="primerApellido">Primer Apellido:</label>
      <input type="text" id="primerApellido" name="primerApellido">

      <label for="segundoApellido">Segundo Apellido:</label>
      <input type="text" id="segundoApellido" name="segundoApellido">

      <label for="dni">DNI:</label>
      <input type="text" id="dni" name="dni">

      <label for="departamento">Departamento:</label>
      <input type="text" id="departamento" name="departamento">

      <label for="distrito">Distrito:</label>
      <input type="text" id="distrito" name="distrito">

      <label for="telefono">Teléfono:</label>
      <input type="text" id="telefono" name="telefono">

      <label>Sexo:</label>
      <div class="radio-group">
        <label class="inline"><input type="radio" name="sexo" value="Masculino">Masculino</label>
        <label class="inline"><input type="radio" name="sexo" value="Femenino">Femenino</label>
      </div>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password">

      <label for="repeatPassword">Repetir Contraseña:</label>
      <input type="password" id="repeatPassword" name="repeatPassword">

      <label for="rol">Rol:</label>
      <select id="rol" name="rol">
        <option value="">Seleccionar</option>
        <option value="Administrador">Administrador</option>
        <option value="Coordinador">Coordinador</option>
        <option value="Usuario">Usuario</option>
      </select>

      <label for="estado">Estado:</label>
      <select id="estado" name="estado">
        <option value="">Seleccionar</option>
        <option value="Activo">Activo</option>
        <option value="Desactivado">Desactivado</option>
      </select>

      <button type="submit" class="submit-button">Registrar Usuario</button>
    </form>
  </div>
</div>

<script>
/* —— mostrar/ocultar submenús —— */
function toggle(btn, sub, arr) {
  sub.classList.toggle('show');
  btn.classList.toggle('active');
  arr.classList.toggle('down');
  arr.classList.toggle('right');
}
btnGestionUsuarios.onclick      = () => toggle(btnGestionUsuarios, submenuGestionUsuarios, arrowGestionUsuarios);
btnGestionDashboards.onclick    = () => toggle(btnGestionDashboards, submenuGestionDashboards, arrowGestionDashboards);
btnGestionCoordinadores.onclick = () => toggle(btnGestionCoordinadores, submenuGestionCoordinadores, arrowGestionCoordinadores);

/* —— confirmación de logout —— */
logoutLink.addEventListener('click', e => {
  if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) e.preventDefault();
});

/* —— confirmación al registrar —— */
document.getElementById('formCrearUsuario').addEventListener('submit', function(e){
  e.preventDefault();
  if (confirm('¿Registrar este usuario?')) {
    alert('Usuario registrado correctamente 🎉');
    this.reset();
  }
});
function toggle(btn, sub, arr) {
  sub.classList.toggle('show');
  btn.classList.toggle('active');
  arr.classList.toggle('down');
  arr.classList.toggle('right');
}
btnGestionUsuarios.onclick      = () => toggle(btnGestionUsuarios, submenuGestionUsuarios, arrowGestionUsuarios);
btnGestionDashboards.onclick    = () => toggle(btnGestionDashboards, submenuGestionDashboards, arrowGestionDashboards);
btnGestionCoordinadores.onclick = () => toggle(btnGestionCoordinadores, submenuGestionCoordinadores, arrowGestionCoordinadores);

/* —— confirmación de logout —— */
logoutLink.addEventListener('click', e => {
  if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) e.preventDefault();
});

/* —— validación + confirmación al registrar —— */
document.getElementById('formCrearUsuario').addEventListener('submit', function (e) {
  e.preventDefault();

  const nombres = this.nombres.value.trim();   // ← campo Nombres
  if (nombres === '') {
    alert('⚠️ El campo "Nombres" es obligatorio.');
    this.nombres.focus();
    return;                                    // corta el envío
  }

  if (confirm('¿Registrar este usuario?')) {
    alert('Usuario registrado correctamente 🎉');
    this.reset();
  }
});
</script>

</body>
</html>
