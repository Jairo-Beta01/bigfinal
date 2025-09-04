<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Voz y Datos - Listar Coordinadores</title>
<link rel="stylesheet" href="css/estilos_comunes.css"><style>
  /* ——— Estilos generales (idénticos a tus otras páginas) ——— */
  *{box-sizing:border-box}
  body,html{margin:0;height:100%;font-family:'Segoe UI',Tahoma,Verdana,sans-serif;background:#f0f2f5}
  nav{position:fixed;top:0;left:0;bottom:0;width:220px;background:#6c63ff;color:#fff;padding:30px 20px;display:flex;flex-direction:column}
  nav h2{margin:0 0 30px 0;font-weight:700;font-size:1.8rem;display:flex;align-items:center;gap:12px;height:90px}
  nav h2 img{width:90px;height:90px;object-fit:contain}
  nav ul{list-style:none;padding:0;margin:0 0 30px 0;width:100%}
  nav ul li{margin-bottom:15px;width:100%}
  nav ul li button,
  nav ul li a.button-link{width:100%;padding:10px 15px;background:#7f73f8;border:none;border-radius:6px;color:#fff;font-weight:600;font-size:1rem;cursor:pointer;text-align:left;display:flex;justify-content:space-between;align-items:center;transition:background .3s}
  nav ul li button:hover,
  nav ul li a.button-link:hover{background:#5a4cd1}
  nav ul li button.active,
  nav ul li a.button-link.active{background:#4a39b8}
  .arrow{border:solid #fff;border-width:0 2px 2px 0;display:inline-block;padding:4px;margin-left:10px;transition:.3s}
  .arrow.down{transform:rotate(45deg)}
  .arrow.right{transform:rotate(-45deg)}
  .submenu{margin-top:8px;margin-left:10px;background:#5549b1;border-radius:6px;padding:8px 0;display:none;flex-direction:column}
  .submenu.show{display:flex}
  .submenu a{color:#fff;padding:6px 15px;text-decoration:none;font-size:.9rem;font-weight:500}
  .submenu a:hover{background:#463b9e}
  nav .logout{margin-top:auto;align-self:stretch;background:#7f73f8;color:#eee;padding:10px;text-align:center;border-radius:6px;font-weight:600;cursor:pointer;transition:background .3s}
  nav .logout:hover{background:#5a4cd1}

  /* ——— Contenido principal ——— */
  .content{margin-left:220px;padding:30px 40px;min-height:100vh}
  .content h1{margin-top:0;font-size:2.2rem;font-weight:700;color:#333}
  .search-box{margin-bottom:15px}
  .search-box input{width:300px;padding:8px 12px;font-size:1rem;border:1px solid #ccc;border-radius:6px}
  table{width:100%;border-collapse:collapse;background:#fff;border-radius:6px;overflow:hidden;box-shadow:0 3px 12px rgb(0 0 0 / .1)}
  thead{background:#6c63ff;color:#fff}
  th,td{padding:10px 12px;text-align:left;border-bottom:1px solid #ddd;font-size:.95rem}
  tbody tr:hover{background:#f1f1f1}
  select{padding:6px 8px;border:1px solid #ccc;border-radius:4px}
  .btn-confirmar{margin-top:20px;padding:12px 25px;background:#6c63ff;color:#fff;font-weight:700;border:none;border-radius:6px;font-size:1rem;cursor:pointer;transition:background .3s}
  .btn-confirmar:hover{background:#574bcf}
</style>
</head>
<body>

<nav>
  <h2><img src="logo.png" alt="Logo" />Voz y Datos</h2>
  <ul>
    <li>
      <button id="btnGestionUsuarios">Gestionar Usuarios<i class="arrow right" id="arrowGestionUsuarios"></i></button>
      <div id="submenuGestionUsuarios" class="submenu">
        <a href="agregarusuario.php">Agregar usuario</a>
        <a href="listarusuario.php">Listar usuario</a>
      </div>
    </li>

    <li>
      <button id="btnGestionCoordinadores" class="active">Gestionar Coordinadores<i class="arrow down" id="arrowGestionCoordinadores"></i></button>
      <div id="submenuGestionCoordinadores" class="submenu show">
        <a href="listarcoordinador.php" class="active">Listar Coordinadores</a>
      </div>
    </li>

    <li>
      <button id="btnGestionDashboards">Gestionar Dashboards<i class="arrow right" id="arrowGestionDashboards"></i></button>
      <div id="submenuGestionDashboards" class="submenu">
        <a href="agregardashboard.php">Agregar Dashboard</a>
        <a href="asignardashboard.php">Asignar Dashboard</a>
      </div>
    </li>
  </ul>
  <a href="index.html" class="logout" id="logoutLink">Cerrar sesión</a>
</nav>

<div class="content">
  <h1>Asignar Dashboard a Coordinadores</h1>

  <div class="search-box">
    <input type="text" id="searchInput" placeholder="Buscar coordinador" />
  </div>

  <table id="coordTable">
    <thead>
      <tr>
        <th>Nombre del Coordinador</th>
        <th>Dashboard a Asignar</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Lucía Pérez</td>
        <td>
          <select>
            <option value="">Seleccionar...</option>
            <option>Dashboard Mujeres</option>
            <option>Dashboard Abuelos</option>
            <option>Dashboard Niñez</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Carlos Gutiérrez</td>
        <td>
          <select>
            <option value="">Seleccionar...</option>
            <option>Dashboard Mujeres</option>
            <option>Dashboard Abuelos</option>
            <option>Dashboard Niñez</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Rosa Fernández</td>
        <td>
          <select>
            <option value="">Seleccionar...</option>
            <option>Dashboard Mujeres</option>
            <option>Dashboard Abuelos</option>
            <option>Dashboard Niñez</option>
          </select>
        </td>
      </tr>
    </tbody>
  </table>

  <button class="btn-confirmar">Confirmar asignaciones</button>
</div>

<script>
/* ——--- Sidebar toggles (idénticos a tus otras páginas) ---—— */
const toggles = [
  ['btnGestionUsuarios','submenuGestionUsuarios','arrowGestionUsuarios'],
  ['btnGestionCoordinadores','submenuGestionCoordinadores','arrowGestionCoordinadores'],
  ['btnGestionDashboards','submenuGestionDashboards','arrowGestionDashboards']
];
toggles.forEach(([btnId,menuId,arrowId])=>{
  const btn   = document.getElementById(btnId);
  const menu  = document.getElementById(menuId);
  const arrow = document.getElementById(arrowId);
  btn.addEventListener('click',()=>{
    menu.classList.toggle('show');
    btn.classList.toggle('active');
    arrow.classList.toggle('down');
    arrow.classList.toggle('right');
  });
});

/* ——--- Filtro de búsqueda en la tabla ---—— */
const searchInput = document.getElementById('searchInput');
const coordTable  = document.getElementById('coordTable').getElementsByTagName('tbody')[0];

searchInput.addEventListener('keyup',()=>{
  const filter = searchInput.value.toLowerCase();
  Array.from(coordTable.rows).forEach(row=>{
    row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
  });
});

/* ——--- Alerta de cierre de sesión ---—— */
document.getElementById('logoutLink').addEventListener('click',e=>{
  e.preventDefault();
  if(confirm('¿Estás seguro de que deseas cerrar sesión?')){
    window.location.href = e.currentTarget.href;
  }
});

/* ——--- (Opcional) feedback del botón confirmar ---—— */
document.querySelector('.btn-confirmar').addEventListener('click',()=>{
  alert('Asignaciones registradas.');
});
</script>
</body>
</html>