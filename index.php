<?php 	session_start();

      	error_reporting(E_ALL ^ E_NOTICE);
      	ini_set('display_errors', 1);

		include "connection/connection.php";
		include "core/lib/lib_system.php";



?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>GUAPA - Administración de Propiedades Alquiladas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>
</head>
<body style="height:1500px">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Ingresar</a></li>
      <li><a href="#">Registrarse</a></li>
      <li><a href="#">Olvidé mi Password</a></li>
      <li><a href="#">A cerca de...</a></li>
    </ul>
  </div>
</nav>

<div class="container" style="margin-top:50px">

</div>

</body>
</html>
