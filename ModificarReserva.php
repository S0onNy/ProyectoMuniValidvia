<?php include("phpConexionConsulta.php");
session_start();
 $variablesesion = $_SESSION['user'];
 if ($variablesesion == null ||  $variablesesion = ''){
   echo "<script>alert('Usted no tiene autorización');</script>";
   header("Location: PaginaPrincipal.php");
   
 }?>
 
 <?php
$con=conectarse();
$sql="select * from variable";
$rs=mysqli_query($con,$sql);
if(mysqli_num_rows($rs)>0){
		while($fila =mysqli_fetch_assoc($rs)){
			$valor = $fila['var'];		
			
		}			
	}
$sql="delete from variable";
$rs=mysqli_query($con,$sql);

	
	$sql="select * from arriendo where Codigo='"."$valor"."'";
	$rs=mysqli_query($con,$sql);
	if(mysqli_num_rows($rs)>0){
		while($fila =mysqli_fetch_assoc($rs)){
		$cc=$fila["codigoCancha"];
		$fs= $fila["FechaSolicitud"];
		$hc= $fila["HoraComienzo"];
		$ht= $fila["HoraTermino"];
		$ru= $fila["rut"];
		}			
	}

$sql2="select * from cliente where rut='"."$ru"."'";
	$rs2=mysqli_query($con,$sql2);
	if(mysqli_num_rows($rs2)>0){
		while($fila =mysqli_fetch_assoc($rs2)){
		$ru=$fila["rut"];
		$no= $fila["nombres"];
		$app= $fila["apellidoP"];
		$apm= $fila["apellidoM"];
		$tel= $fila["TelefonoOcel"];
		$co= $fila["correo"];
		}			
	}



        $sql9="select * from cancha where codigoCancha='"."$cc"."'";
			$rs9=mysqli_query($con,$sql9);
	if(mysqli_num_rows($rs9)>0){
		 while($fila =mysqli_fetch_row($rs9)){
			
       
         $nomc= $fila[1];
			 
		 }
}
        
   
		


 
?>

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
              <a class="nav-link" href="AdministrarReserva.php">Administrar Reserva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cerrarSesion.php">Cerrar Sesión</a>
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
         <li><a href="AdministrarReserva.php" style="color:#FFF">
          <button type="button" class="btn" style="background-color:#666">Administrar Reserva</a></button>
        </li>
         <br>
          <li><a href="IngresarReserva.php" style="color:#FFF">
          <button type="button" class="btn" style="background-color:#666">Ingresar Nueva Reserva</a></button>
        </li>
      </ul>
      <br>
      
    </div>
  
  <div class="col-sm-9">
  	<br>
   	<form action="ModificarReserva.php" method="post" onSubmit="return validar()" enctype="multipart/form-data">

    	<h4><small><b>MODIFICAR RESERVA</b></small></h4>
    	<hr>
    	<div class="col-sm-4" >
        	<p>Código 
        	<input type="text" name="codigo" id="codigo" value="<?php echo $valor; ?>"  style="visibility: hidden"><b><?php echo $valor; ?></b>
      	</p>
    	</div>
    	<div class="row">
     	<div class="col-sm-4" >
      		<p>Cancha &nbsp;
      		
        	<select name="cancha">
        	
         	<option value='<?php echo $cc ?>' selected><?php echo $nomc ?></option>
         	<?php 
         
           	$sql="select * from cancha";
				$rs=mysqli_query($con,$sql);
		   	while($fila =mysqli_fetch_row($rs)){
			
       
           echo "<option value='".$fila[0]."'>".$fila[1]."</option>";
        
        
   
			}
         ?>
        </select></p> 
    </div>
      	<div class="col-sm-4" >
        	<p>Fecha: &nbsp;
          	<input type="date" name="fecha" id="fecha" value="<?php echo $fs ?>" required>
        	</p><span class="msj" id="msj_fecha"></span>
      	</div>
      	<div class="col-sm-4" >
        	<p>Hora Comienzo: &nbsp;&nbsp;&nbsp;
          	<select name='comienzo' >}
          	<option value="<?php echo $hc ?>" selected><?php echo $hc ?></option>
						<option value='0'>0</option>
        				<option value='1'>1</option>
						<option value='2'>2</option>
     		<option value='3'>3</option>
     		<option value='4'>4</option>
     		<option value='5'>5</option>
     		<option value='6'>6</option>
     		<option value='7'>7</option>
     		<option value='8'>8</option>
     		<option value='9'>9</option>
     		<option value='10'>10</option>
     		<option value='11'>11</option>
     		<option value='12'>12</option>
     		<option value='13'>13</option>
     		<option value='14'>14</option>
     		<option value='15'>15</option>
     		<option value='16'>16</option>
     		<option value='17'>17</option>
     		<option value='18'>18</option>
     		<option value='19'>19</option>
     		<option value='20'>20</option>
     		<option value='21'>21</option>
     		<option value='22'>22</option>
     		<option value='23'>23</option>
      		</select>
        	</p><span class="msj" id="msj_comienzo"></span>
      	</div>
      	<div class="col-sm-4" >
        	<p>Hora Termino: &nbsp;&nbsp;&nbsp;
          	<select name='termino'  value="<?php echo $ht ?>">
          	<option value="<?php echo $ht ?>" selected><?php echo $ht ?></option>
						<option value='0'>0</option>
        				<option value='1'>1</option>
						<option value='2'>2</option>
     		<option value='3'>3</option>
     		<option value='4'>4</option>
     		<option value='5'>5</option>
     		<option value='6'>6</option>
     		<option value='7'>7</option>
     		<option value='8'>8</option>
     		<option value='9'>9</option>
     		<option value='10'>10</option>
     		<option value='11'>11</option>
     		<option value='12'>12</option>
     		<option value='13'>13</option>
     		<option value='14'>14</option>
     		<option value='15'>15</option>
     		<option value='16'>16</option>
     		<option value='17'>17</option>
     		<option value='18'>18</option>
     		<option value='19'>19</option>
     		<option value='20'>20</option>
     		<option value='21'>21</option>
     		<option value='22'>22</option>
     		<option value='23'>23</option>
      		</select>
        	</p><span class="msj" id="msj_termino"></span>
      	</div>
      	<div class="col-sm-4" >
        	<p>Nombre: &nbsp;&nbsp;
          	<input type="text" name="nombre" id="nombre" value="<?php echo $no ?>" required>
        	</p><span class="msj" id="msj_nombre"></span>
      	</div>
      	<div class="col-sm-4" >
        	<p>Apellido Paterno: &nbsp;&nbsp;
          	<input type="text" name="paterno" id="paterno" value="<?php echo $app ?>" required>
        	</p><span class="msj" id="msj_paterno"></span>
      	</div>
      	<div class="col-sm-4" >
        	<p>Apellido Materno: &nbsp;&nbsp;
          	<input type="text" name="materno" id="materno" value="<?php echo $apm ?>" required>
        	</p><span class="msj" id="msj_materno"></span>
      	</div>
      	<div class="col-sm-4" >
        	<p>Rut: &nbsp;&nbsp;
          	<input type="text" name="rut" id="rut" value="<?php echo $ru ?>" required>
        	</p><span class="msj" id="msj_rut"></span>
      	</div>
      	<div class="col-sm-4" >
        	<p>Teléfono: &nbsp;&nbsp;
          	<input type="number" name="telefono" id="telefono" value="<?php echo $tel ?>" required>
        	</p><span class="msj" id="msj_telefono"></span>
      	</div>
      	<div class="col-sm-4" >
        	<p>Correo: &nbsp;&nbsp;
          	<input type="text" name="correo" id="correo" value="<?php echo $co ?>" required>
        	</p><span class="msj" id="msj_correo"></span>
      	</div>
      	
      	
      <br>
      <br>
      <p>&nbsp;&nbsp;&nbsp;
      <button type="submit" class="btn btn-success">Modificar</button>
      </p>
    </div>
    </form>
    
    
    
    
    <?php 
	if($_POST){
	$codigo=$_POST['codigo'];
	 $cancha=$_POST['cancha'];
	 $fecha=$_POST['fecha'];
	 $comienzo=$_POST['comienzo'];
	 $termino=$_POST['termino'];
		$nombre=$_POST['nombre'];
	 $paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	$rut=$_POST['rut'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	 modificarReserva($codigo,$cancha,$fecha,$comienzo,$termino,$nombre,$paterno,$materno,$rut,$telefono,$correo);
	}
  
  
  
  ?>
    
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