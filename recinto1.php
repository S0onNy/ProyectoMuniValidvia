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

    <title>Reserva Cancha</title>

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
              <a class="nav-link" href="PaginaPrincipal.php">Pagina Principal
                <span class="sr-only">(current)</span>
              </a>
            </li>
            &nbsp;&nbsp;&nbsp;&nbsp;
            
           

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
   
  
      
    </div>
  
 <div class="container-fluid">
<div class="wrap">
<form action="recinto1.php".php" method="post" >
  <h4><small>Rellene Formulario</small></h4>
   <hr>
    
    <div class="col-sm-12" >
      <p>Nombre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="nombres" id="nombres" required>
      </p>
    </div>
    
    <div class="col-sm-12" >
    <p>
      Apellido Paterno             &nbsp;
     <input type="text" name="apellidoP" id="apellidoP" required>
         </p>
    </div>
    
    <div class="col-sm-12" >
     <p>
    Apeliido Materno&nbsp;
    <input type="text" name="apellidoM" id="apellidoM" required>
        </p>
    </div>
    
     <div class="col-sm-12" >
      <p>
      Rut       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="text" name="rut" id="rut" required>
         </p>
     </div>
 
     <div class="col-sm-12" >
      <p>
     telefono o celular &nbsp;
     <input type="number" name="tel" id="tel" required>
         </p>
     </div>
     
     <div class="col-sm-12" >
      <p>
     Correo Electronico 
     <input type="email" name="correo" id="correo" required>
         </p>
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
   
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
  
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    
  

<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg></body>
</html>