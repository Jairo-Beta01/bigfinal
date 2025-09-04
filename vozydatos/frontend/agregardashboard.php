<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Voz y Datos - Agregar Dashboard</title>
<style>
  /* Reset básico */
  * {
    box-sizing: border-box;
  }
  body, html {
    margin: 0;
    height: 100%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5;
  }

  /* Sidebar */
  nav {
    position: fixed;
    top: 0; left: 0; bottom: 0;
    width: 220px;
    background-color: #6c63ff;
    color: white;
    padding: 30px 20px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
  }
nav h2 {
  margin: 0 0 30px 0;
  font-weight: 700;
  font-size: 1.8rem;
  display: flex;
  align-items: center;
  gap: 12px;
  line-height: 1.2;
  height: 90px;
}

nav h2 img.logo {
  width: 90px;
  height: 90px;
  object-fit: contain;
}


  nav ul {
    list-style: none;
    padding-left: 0;
    margin: 0 0 30px 0;
    width: 100%;
  }
  nav ul li {
    margin-bottom: 15px;
    width: 100%;
  }
  nav ul li button,
  nav ul li a.button-link {
    width: 100%;
    padding: 10px 15px;
    background-color: #7f73f8;
    border: none;
    border-radius: 6px;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    text-align: left;
    transition: background-color 0.3s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  nav ul li button:hover,
  nav ul li a.button-link:hover {
    background-color: #5a4cd1;
  }
  nav ul li button.active,
  nav ul li a.button-link.active {
    background-color: #4a39b8;
  }
  
  /* Flechas desplegables */
  .arrow {
    border: solid white;
    border-width: 0 2px 2px 0;
    display: inline-block;
    padding: 4px;
    margin-left: 10px;
    transition: transform 0.3s ease;
  }
  .arrow.down {
    transform: rotate(45deg);
  }
  .arrow.right {
    transform: rotate(-45deg);
  }

  /* Submenús */
  .submenu {
    margin-top: 8px;
    margin-left: 10px;
    background-color: #5549b1;
    border-radius: 6px;
    padding: 8px 0;
    display: none;
    flex-direction: column;
  }
  .submenu.show {
    display: flex;
  }
  .submenu a {
    color: white;
    padding: 6px 15px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
  }
  .submenu a:hover {
    background-color: #463b9e;
  }

  nav .logout {
    cursor: pointer;
    font-weight: 600;
    color: #eee;
    padding: 10px 15px;
    border-radius: 6px;
    background-color: #7f73f8;
    transition: background-color 0.3s ease;
    align-self: stretch;
    margin-top: auto;
    display: inline-block;
    text-align: center;
    text-decoration: none;
  }
  nav .logout:hover {
    background-color: #5a4cd1;
  }

  /* Contenido principal */
  .content {
    margin-left: 220px;
    padding: 30px 40px;
    min-height: 100vh;
    max-width: calc(100% - 240px);
  }
  .content h1 {
    margin-top: 0;
    font-weight: 700;
    font-size: 2.2rem;
    color: #333;
    margin-bottom: 20px;
  }
  .content label {
    font-weight: 600;
    margin-right: 10px;
  }
  .content .form-group {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .content input[type="text"] {
    flex-grow: 1;
    padding: 8px 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 1rem;
  }
  .content button {
    padding: 8px 20px;
    background-color: #6c63ff;
    color: white;
    font-weight: 600;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .content button:hover {
    background-color: #574bcf;
  }
  /* ------------- NUEVO LOOK ------------- */
.card{
  background:#fff;
  border-radius:10px;
  box-shadow:0 4px 18px rgb(0 0 0 / .08);
  padding:30px 35px;
  max-width:900px;
  margin:auto;             /* centrado */
}
form{
  display:flex;
  flex-direction:column;
  gap:25px;
}
.form-row{
  display:grid;
  grid-template-columns:150px 1fr 150px 1fr; /* etiqueta-campo   ×2 */
  gap:15px 20px;
  align-items:center;
}
form label{font-weight:600;color:#444}
form input{
  width:100%;
  padding:9px 12px;
  border:1px solid #ccc;
  border-radius:6px;
  font-size:1rem;
}
.btn-row{
  display:flex;
  justify-content:flex-end;
}
.btn-row button{
  background:#6c63ff;
  border:none;
  color:#fff;
  padding:10px 28px;
  font-weight:600;
  border-radius:8px;
  cursor:pointer;
  transition:.3s;
}
.btn-row button:hover{background:#574bcf}

</style>
</head>
<body>

<nav>
  <h2>
    <img src="logo.png" alt="Logo Voz y Datos" class="logo" />
    Voz y Datos
  </h2>
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
        <a href="asignardashboard.php">Listar Dashboard</a>
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

  <h1>Agregar Dashboard</h1>

  <section class="card">
    <form id="formDashboard" autocomplete="off">

      <div class="form-row">
        <label for="dashName">Nombre:</label>
        <input  type="text" id="dashName" name="dashName" placeholder="Nombre del dashboard" required>

        <label for="dashDesc">Descripción:</label>
        <input  type="text" id="dashDesc" name="dashDesc" placeholder="Breve descripción" required>
      </div>

      <div class="form-row">
        <label for="dashOwner">Asignado a:</label>
        <input type="text" id="dashOwner" name="dashOwner" placeholder="Responsable / Usuario">

        <label for="dashLink">Link (URL):</label>
        <input type="text" id="dashLink" name="dashLink" placeholder="https://app.powerbi.com/…" required>
      </div>

      <div class="btn-row">
        <button type="submit">Agregar dashboard</button>
      </div>
    </form>
  </section>

</div>

<script>
  // Sidebar desplegables
  // Removed: const btnDashboard = document.getElementById('btnDashboard');
  // Removed: const submenuDashboard = document.getElementById('submenuDashboard');
  // Removed: const arrowDashboard = document.getElementById('arrowDashboard');

  // Removed: btnDashboard.addEventListener('click', () => {
  // Removed:   submenuDashboard.classList.toggle('show');
  // Removed:   btnDashboard.classList.toggle('active');

  // Removed:   if (submenuDashboard.classList.contains('show')) {
  // Removed:     arrowDashboard.classList.remove('right');
  // Removed:     arrowDashboard.classList.add('down');
  // Removed:   } else {
  // Removed:     arrowDashboard.classList.remove('down');
  // Removed:     arrowDashboard.classList.add('right');
  // Removed:   }
  // Removed: });

  const btnGestionUsuarios = document.getElementById('btnGestionUsuarios');
  const submenuGestionUsuarios = document.getElementById('submenuGestionUsuarios');
  const arrowGestionUsuarios = document.getElementById('arrowGestionUsuarios');

  btnGestionUsuarios.addEventListener('click', () => {
    submenuGestionUsuarios.classList.toggle('show');
    btnGestionUsuarios.classList.toggle('active');

    if (submenuGestionUsuarios.classList.contains('show')) {
      arrowGestionUsuarios.classList.remove('right');
      arrowGestionUsuarios.classList.add('down');
    } else {
      arrowGestionUsuarios.classList.remove('down');
      arrowGestionUsuarios.classList.add('right');
    }
  });

  const btnGestionDashboards = document.getElementById('btnGestionDashboards');
  const submenuGestionDashboards = document.getElementById('submenuGestionDashboards');
  const arrowGestionDashboards = document.getElementById('arrowGestionDashboards');

  btnGestionDashboards.addEventListener('click', () => {
    submenuGestionDashboards.classList.toggle('show');
    btnGestionDashboards.classList.toggle('active');

    if (submenuGestionDashboards.classList.contains('show')) {
      arrowGestionDashboards.classList.remove('right');
      arrowGestionDashboards.classList.add('down');
    } else {
      arrowGestionDashboards.classList.remove('down');
      arrowGestionDashboards.classList.add('right');
    }
  });

const btnGestionCoordinadores      = document.getElementById('btnGestionCoordinadores');
const submenuGestionCoordinadores  = document.getElementById('submenuGestionCoordinadores');
const arrowGestionCoordinadores    = document.getElementById('arrowGestionCoordinadores');
btnGestionCoordinadores.addEventListener('click', () => {
  submenuGestionCoordinadores.classList.toggle('show');
  btnGestionCoordinadores.classList.toggle('active');
  arrowGestionCoordinadores.classList.toggle('down');
  arrowGestionCoordinadores.classList.toggle('right');
});

  document.getElementById('logoutLink').addEventListener('click', function (e) {
  e.preventDefault();                                // Detiene la navegación inmediata
  if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
    window.location.href = this.href;                // Redirige solo si el usuario confirma
  }
});
const dashForm = document.getElementById('formDashboard');

  dashForm.addEventListener('submit', e => {
    e.preventDefault();                          // evita recarga

    // Aquí podrías enviar los datos vía fetch()
    // fetch('backend/tu-ruta.php', {method:'POST', body: new FormData(dashForm)})

    alert('✅ ¡Dashboard agregado correctamente!');

    dashForm.reset();                            // limpia los campos
  });
</script>

</body>
</html>