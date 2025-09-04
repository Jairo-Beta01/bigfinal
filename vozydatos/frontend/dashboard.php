<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Voz y Datos - Dashboard</title>
  <style>
    /* Reset básico */
    * { box-sizing: border-box; }
    body, html {
      margin: 0;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
    }

    /* Sidebar */
    nav {
      position: fixed; top: 0; left: 0; bottom: 0;
      width: 220px; background-color: #6c63ff; color: white;
      padding: 30px 20px; display: flex; flex-direction: column;
      align-items: flex-start;
    }
    nav h2 {
      margin: 0 0 30px; font-weight: 700; font-size: 1.8rem;
      display: flex; align-items: center; gap: 12px; height: 90px;
    }
    nav h2 img.logo {
      width: 90px; height: 90px; object-fit: contain;
    }
    nav ul {
      list-style: none; padding: 0; margin: 0; width: 100%;
    }
    nav ul li {
      width: 100%; margin-bottom: 15px;
    }
    nav ul li button,
    nav ul li a {
      width: 100%; padding: 10px 15px;
      background-color: #7f73f8; border: none; border-radius: 6px;
      color: white; font-weight: 600; font-size: 1rem;
      cursor: pointer; text-align: left;
      display: flex; justify-content: space-between; align-items: center;
      transition: background-color 0.3s ease;
    }
    nav ul li button:hover,
    nav ul li a:hover {
      background-color: #5a4cd1;
    }
    nav ul li button.active,
    nav ul li a.active {
      background-color: #4a39b8;
    }
    .arrow {
      border: solid white; border-width: 0 2px 2px 0;
      display: inline-block; padding: 4px; margin-left: 10px;
      transition: transform 0.3s ease;
    }
    .arrow.down { transform: rotate(45deg); }
    .arrow.right { transform: rotate(-45deg); }
    .submenu {
      margin-top: 8px; margin-left: 10px;
      background-color: #5549b1; border-radius: 6px;
      padding: 8px 0; display: none; flex-direction: column;
    }
    .submenu.show { display: flex; }
    .submenu a {
      color: white; padding: 6px 15px;
      text-decoration: none; font-size: 0.9rem;
      font-weight: 500;
    }
    .submenu a:hover { background-color: #463b9e; }
    nav .logout {
      margin-top: auto; width: 100%;
      text-align: center; padding: 10px 15px;
      background-color: #7f73f8; color: #eee;
      text-decoration: none; border-radius: 6px;
      font-weight: 600; transition: background-color 0.3s ease;
    }
    nav .logout:hover { background-color: #5a4cd1; }

    /* Contenido principal */
    .content {
      margin-left: 220px; padding: 30px 40px;
      min-height: 100vh; display: flex; flex-direction: column;
    }
    .content h1 {
      margin: 0 0 20px; font-weight: 700; font-size: 2.2rem;
      color: #333;
    }

    /* Dashboard embed */
    .dashboard-container {
      flex-grow: 1; background: white;
      border-radius: 12px; box-shadow: 0 4px 16px rgb(0 0 0 / 0.1);
      overflow: hidden; display: flex; flex-direction: column;
    }
    iframe.powerbi {
      flex-grow: 1; border: none; width: 100%;
    }
  </style>
</head>
<body>

<nav>
  <h2>
    <img src="logo.png" class="logo" alt="Logo" />
    Voz y Datos
  </h2>
  <ul>
    <li>
      <button id="btnDashboard" class="active">
        Dashboard
        <i class="arrow down" id="arrowDashboard"></i>
      </button>
      <div id="submenuDashboard" class="submenu show">
        <a href="dashboard.php" class="active">Dashboard 1</a>
        <a href="dashboard2.php">Dashboard 2</a>
      </div>
    </li>
  </ul>

  <a href="index.html" class="logout" id="logoutLink">Cerrar sesión</a>
</nav>

<div class="content">
  <h1>Dashboard 1</h1>
  <div class="dashboard-container">
    <iframe
      class="powerbi"
      src="https://app.powerbi.com/view?r=eyJrIjoiODY3NjcwNTktZTVjMy00NWUzLWEyODYtZjlkOWI5ZDU1MDg3IiwidCI6IjE1NGQ5NDY2LTVmZDQtNDQyYS1iYjZkLWY2ODNiYmY1MjMxZiIsImMiOjR9"
      allowfullscreen
      sandbox="allow-scripts allow-same-origin allow-popups">
    </iframe>
  </div>
</div>

<script>
  // Toggle de submenu
  const btnDash      = document.getElementById('btnDashboard');
  const submenuDash  = document.getElementById('submenuDashboard');
  const arrowDash    = document.getElementById('arrowDashboard');
  btnDash.addEventListener('click', () => {
    submenuDash.classList.toggle('show');
    btnDash.classList.toggle('active');
    arrowDash.classList.toggle('down');
    arrowDash.classList.toggle('right');
  });

  // Confirmación de logout
  document.getElementById('logoutLink').addEventListener('click', e => {
    if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) {
      e.preventDefault();
    }
  });
</script>

</body>
</html>
