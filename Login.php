<?php include("phpConexionConsulta.php");
session_start();

?>
<!doctype html>
<html>


<head>
<meta charset="utf-8">
<title>Pagina de inicio Buses Futrono</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">﻿
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

</head>
<body class="text-center">

<div class="container">
<form class="form-signin" action="Login.php" method="post">
<img class="mb-4" src="images/UI_PerkIcon_Sharpshooter_black.png" alt="" width="72" height="72">
<h1 class="h3 mb-3 fontweight-normal">Ingresar al sistema</h1>

<label for="usuario" cla-ss="sr-only"></label>
<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>

<label for="inputPassword" class="sr-only"></label>
<input type="password" id="pass"  name="pass" class="form-control" placeholder="Contraseña" required>

<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<p class="mt-5 mb-3 text-muted">InformaticaInacapSolutions© 2018</p>

<?php 
	if($_POST){
	 $usuario=$_POST['usuario'];
	 $pass=$_POST['pass'];
	 
	validarIngreso($usuario,$pass);
	}
  
  
  
  ?>

</form>  

</div>
</body>

</html>

