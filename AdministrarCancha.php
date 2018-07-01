<?php include("phpConexionConsulta.php"); ?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap CSS carpeta-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>

<body>
    <div class="navbar-wrapper">
      <div class="container">

          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          
        <img src="imagenes/backlogo.jpg" alt="Italian Trulli">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item active">
              <a class="nav-link" href="PaginaPrincipalAdministracion.php">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a class="nav-link" href="AdministrarCancha.php">Administrar Cancha</a>
             </li>
            <li class="nav-item">
              <a class="nav-link" href="Login.php">Administrar Reserva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Login.php">Cerrar Sesión</a>
            </li>
           

          </ul>
        </div>
      </div>
    </nav>

      </div>
    </div>


 <br><br><br><br><br><br>

     <div class="container-fluid">
  <div class="row content">
    <div class="sidenav" style="padding-left:10px">
      <h3 style="color:#FFF">Administrar Cancha</h3>
      <br>
      <ul class="navbar-toggler">
         <li><a href="AdministrarCancha.php" style="color:#FFF">
          <button type="button" class="btn" style="background-color:#666">Administrar Cancha</a></button>
        </li>
         <br>
          <li><a href="IngresarCancha.php" style="color:#FFF">
          <button type="button" class="btn" style="background-color:#666">Ingresar Nueva Cancha</a></button>
        </li>
      </ul>
      <br>
      
    </div>
  
<div class="col-sm-9">
 <form  method="post"  name="fmr1">
      <h4><small>BUSCAR/MODIFICAR</small></h4>
      <hr>
      <p>Código Cancha</p>
      
        <div class="form-group">
          <input type="hiden" name="patente" id="patente" required>
          <button type="submit" class="btn btn-success" name="modificar"  id="modificar">Modificar</button>
          <button type="submit" class="btn btn-success" name="eliminar"  id="eliminar">Eliminar</button>
          <span class="msj" id="msj_patente"></span>
          </form>
          
          
            
            
             
          
        </div>
    
<h2>Listado Completo</h2>
</div>  
     </div>
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    
  

<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg></body>
</html>