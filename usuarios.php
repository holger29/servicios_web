<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: form_login.html");
    exit;
}
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
  <a href="logout.php" class="logout">Cerrar sesión</a>
  <h2 class="usuario"><?php echo $usuario; ?></h2>
  <div class="foto">
    <img src="image.png" alt="Foto de perfil">
  </div>
</header>

<div class="contenido">
  <h1>Bienvenid(@) <?php echo $usuario; ?>,<br>
      aquí podrá encontrar los distintos servicios que usted desea</h1>

  <select>
    <option disabled selected>Seleccione un servicio</option>
    <option>Soporte al cliente</option>
    <option>Diseño front-end</option>
    <option>Diseño Back-end</option>
    <option>Asesoría en software</option>
    <option>Inteligencia Artificial</option>
    <option>Análisis y Desarrollo de Software</option>
  </select>
</div>

</body>
</html>
