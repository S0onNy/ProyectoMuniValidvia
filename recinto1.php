<?php include("phpConexionConsulta.php"); ?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
﻿
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
/* Set height of the grid so .sidenav can be 100% (adjust as needed) */






.row.content {
	height: 550px;
}
/* Set gray background color and 100% height */
.sidenav {
	background-color: #333333;
	height: 100%;
	width: 280px;
	margin-left: 15px;
}
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
.row.content {
	height: auto;
}
}
</style>
<title>Untitled Document</title>
</head>

<body>
<div class="container-fluid">
<div class="wrap">
<form action="recinto1.php".php" method="post" >
  <h4><small>Rellene Formulario</small></h4>
  <hr>
  
  <div class="row">
  
    <div class="col-sm-6" >
      <p>Nombre 
    </div>
    
    <div class="col-sm-6" >
      <input type="text" name="nombres" id="nombres" required>
      <span class="msj" id="msj_nombre"></span> 
    </div>
    
    <div class="col-sm-6" >
     Apellido Paterno
    </div>
    
    <div class="col-sm-6" >
     <span class="msj" id="msj_nombre"></span>
     <input type="text" name="apellidoP" id="apellidoP" required>
    </div>
    
    <div class="col-sm-6" >
    Apeliido Materno
    </div>
    
    <div class="col-sm-6" >
    
    <input type="text" name="apellidoM" id="apellidoM" required>
    </div>
    
     <div class="col-sm-6" >
      Rut 
     </div>
     
     <div class="col-sm-6" >
      <input type="text" name="rut" id="rut" required>
     
     </div>
 
     <div class="col-sm-6" >
     telefono o celular 
     </div>
     
     <div class="col-sm-6" >
     <input type="number" name="tel" id="tel" required>
     </div>
     
     <div class="col-sm-6" >
     Correo Electronico 
     </div>
    
     <div class="col-sm-6" >
     <input type="email" name="correo" id="correo" required>
     </div>
     
     <div class="col-sm-12" >
     <select name="asunto">
        <option value="Consulta">Consulta</option>
        <option value="peticion">peticion</option>
        <option value="Comentario">Comentario</option>
      </select></p>
     </div>
     
     <div class="col-sm-12" >
     <textarea name="mensaje" id="mensaje" cols="30" rows="10" required></textarea>
     </div>

     <div class="col-sm-12" >
     <button type="submit" class="btn btn-success" >Enviar</button>
     </div>
   
  </p>
  
</div>

<?php 
if($_POST)
	{
		
	   $nombres=$_POST['nombres'];
	   $rut=$_POST['rut'];
	   $ap=$_POST['apellidoP'];
	   $am=$_POST['apellidoM'];
	   $telefono=$_POST['tel'];
	   $mesaje=$_POST['mensaje'];
	   $correo=$_POST['correo'];
	   $as=$_POST['asunto'];
	   formulario($nombres,$rut,$ap,$am,$telefono,$mesaje,$correo,$as);
	}
 

?>
 </form>
 </div>
</div>
</body>
</html>