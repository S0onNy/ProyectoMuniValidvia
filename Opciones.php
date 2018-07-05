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

 <div class="container">
  <h2>Que desea hacer?</h2>
  <form action="Opciones.php" method="post" id="sel" name="sel">
  <button type="submit" class="btn btn-primary btn-block" name="reservar" id="reservar">Reservar Cancha</button>
  <button type="submit" class="btn btn-default btn-block" name="formulario" id="formulario">Formulario</button>
  
  <?php 
  
  if (isset($_POST['reservar'])){
	  header('Location: ReservaCancha.php');
	  }
  if (isset($_POST['formulario'])){
	    header('Location: recinto1.php');
	  }
  
  
  ?>
  </form>

</div>

 
   
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
  
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    
  

<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg></body>
</html>