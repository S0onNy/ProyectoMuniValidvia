<?php include("phpConexionConsulta.php");
session_start();
 $variablesesion = $_SESSION['user'];
 if ($variablesesion == null ||  $variablesesion = ''){
   echo "<script>alert('Usted no tiene autorización');</script>";
   header("Location: PaginaPrincipal.php");
   
 }
?>
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

	
	$sql="select cancha.nombre ,cancha.direccion, cancha.telefono, cancha.superficie, cancha.imagen, estado.hora ,estado.lunes ,estado.martes ,estado.miercoles ,estado.jueves ,estado.viernes ,estado.sabado ,estado.domingo from estado inner join cancha ON estado.codigoCancha=cancha.codigoCancha where cancha.codigoCancha='"."$valor"."'";
	$rs=mysqli_query($con,$sql);
	if(mysqli_num_rows($rs)>0){
		while($fila =mysqli_fetch_assoc($rs)){
		$nom=$fila["nombre"];
		$dir= $fila["direccion"];
		$tel= $fila["telefono"];
		$sup= $fila["superficie"];
		$ima= $fila["imagen"];
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
  	<br>
   	<form action="ModificarCancha.php" method="post" onSubmit="return validar()" enctype="multipart/form-data">

    	<h4><small><b>MODIFICAR CANCHA</b></small></h4>
    	<hr>
    	<div class="row">
     	 <div class="col-sm-4" >
        	<p>Código 
        	<input type="text" name="codigoCancha" id="codigoCancha" value="<?php echo $valor; ?>"  style="visibility: hidden"><b><?php echo $valor; ?></b>
      	</p>
    	</div>
     	<br>
      	<div class="col-sm-4" >
        	<p>Nombre: &nbsp;
          	<input type="text" name="nombre" id="nombre" value="<?php echo $nom; ?>" required>
        	</p><span class="msj" id="msj_nombre"></span>
      	</div>
      	
      	<div class="col-sm-4" >
        	<p>Dirección: &nbsp;&nbsp;&nbsp;
          	<input type="text" name="direccion" id="direccion" value="<?php echo $dir; ?>" required>
        	</p><span class="msj" id="msj_direccion"></span>
      	</div>
      	<div class="col-sm-4" >
        	<p>Fono contacto: &nbsp;&nbsp;
          	<input type="number" name="telefono" id="telefono" value="<?php echo $tel; ?>" required>
        	</p><span class="msj" id="msj_telefono"></span>
      	</div>
      	
      	<div class="col-sm-4" >
        	<p>Superficie: &nbsp;&nbsp;
          	<input type="text" name="superficie" id="superficie" value="<?php echo $sup; ?>" required>
        	</p><span class="msj" id="msj_superficie"></span>
      	</div>
      	
      	<div class="col-sm-4" >
        	<p>Imagen: &nbsp;
          	<input type="file" name="imagen" id="imagen">
        	</p>
      	</div>
      	<br>
      	<br>
      	<br>
      	
      	
       	<table border="1">
        	<tr>
        		<th>Hora</th>
        		<th>Lunes</th>
        		<th>Martes</th>
        		<th>Miercoles</th>
        		<th>Jueves</th>
        		<th>Viernes</th>
        		<th>Sábado</th>
        		<th>Domingo</th>
        	</tr>
        	<?php
			$hora=0;
			$con=conectarse();
			$sql="select lunes,martes,miercoles,jueves,viernes,sabado,domingo from estado where codigoCancha='"."$valor"."'";
			$rs=mysqli_query($con,$sql);
			if(mysqli_num_rows($rs)>0)
			{
				while($fila =mysqli_fetch_assoc($rs))
					{
					$lu=$fila["lunes"];
					$ma=$fila["martes"];
					$mi=$fila["miercoles"];
					$ju=$fila["jueves"];
					$vi=$fila["viernes"];
					$sa=$fila["sabado"];
					$do=$fila["domingo"];
					 
				
				    echo"<tr>";
						echo"<td>$hora:00</td>";
						if($lu=='Disponible')
						{
							echo"<td>";
							echo"<select name='EstadoLunes$hora'>";
							echo"<option value='Disponible'>Disponible</option>";
        					echo"<option value='Ocupada'>Ocupada</option>";
							echo"<option value='Cerrada'>Cerrada</option>";
      						echo"</select>";
							echo"</td>";
						}
						else
						{
							if($lu=='Ocupada')
							{
								echo"<td>";
								echo"<select name='EstadoLunes$hora'>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible''>Disponible</option>";
								echo"<option value='Cerrada'>Cerrada</option>";
      							echo"</select>";
								echo"</td>";
							}
							else
							{
								if($lu=='Cerrada')
								{
								echo"<td>";
								echo"<select name='EstadoLunes$hora'>";
								echo"<option value='Cerrada'>Cerrada</option>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible'>Disponible</option>";
								echo"</select>";
								echo"</td>";
								}
							}
						}
        				if($ma=='Disponible')
						{
							echo"<td>";
							echo"<select name='EstadoMartes$hora'>";
							echo"<option value='Disponible'>Disponible</option>";
        					echo"<option value='Ocupada'>Ocupada</option>";
							echo"<option value='Cerrada'>Cerrada</option>";
      						echo"</select>";
							echo"</td>";
						}
						else
						{
							if($ma=='Ocupada')
							{
								echo"<td>";
								echo"<select name='EstadoMartes$hora'>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible''>Disponible</option>";
								echo"<option value='Cerrada'>Cerrada</option>";
      							echo"</select>";
								echo"</td>";
							}
							else
							{
								if($ma=='Cerrada')
								{
								echo"<td>";
								echo"<select name='EstadoMartes$hora'>";
								echo"<option value='Cerrada'>Cerrada</option>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible'>Disponible</option>";
								echo"</select>";
								echo"</td>";
								}
							}
						}
        				if($mi=='Disponible')
						{
							echo"<td>";
							echo"<select name='EstadoMiercoles$hora'>";
							echo"<option value='Disponible'>Disponible</option>";
        					echo"<option value='Ocupada'>Ocupada</option>";
							echo"<option value='Cerrada'>Cerrada</option>";
      						echo"</select>";
							echo"</td>";
						}
						else
						{
							if($mi=='Ocupada')
							{
								echo"<td>";
								echo"<select name='EstadoMiercoles$hora'>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible''>Disponible</option>";
								echo"<option value='Cerrada'>Cerrada</option>";
      							echo"</select>";
								echo"</td>";
							}
							else
							{
								if($mi=='Cerrada')
								{
								echo"<td>";
								echo"<select name='EstadoMiercoles$hora'>";
								echo"<option value='Cerrada'>Cerrada</option>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible'>Disponible</option>";
								echo"</select>";
								echo"</td>";
								}
							}
						}
						if($ju=='Disponible')
						{
							echo"<td>";
							echo"<select name='EstadoJueves$hora'>";
							echo"<option value='Disponible'>Disponible</option>";
        					echo"<option value='Ocupada'>Ocupada</option>";
							echo"<option value='Cerrada'>Cerrada</option>";
      						echo"</select>";
							echo"</td>";
						}
						else
						{
							if($ju=='Ocupada')
							{
								echo"<td>";
								echo"<select name='EstadoJueves$hora'>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible''>Disponible</option>";
								echo"<option value='Cerrada'>Cerrada</option>";
      							echo"</select>";
								echo"</td>";
							}
							else
							{
								if($ju=='Cerrada')
								{
								echo"<td>";
								echo"<select name='EstadoJueves$hora'>";
								echo"<option value='Cerrada'>Cerrada</option>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible'>Disponible</option>";
								echo"</select>";
								echo"</td>";
								}
							}
						}
        				if($vi=='Disponible')
						{
							echo"<td>";
							echo"<select name='EstadoViernes$hora'>";
							echo"<option value='Disponible'>Disponible</option>";
        					echo"<option value='Ocupada'>Ocupada</option>";
							echo"<option value='Cerrada'>Cerrada</option>";
      						echo"</select>";
							echo"</td>";
						}
						else
						{
							if($vi=='Ocupada')
							{
								echo"<td>";
								echo"<select name='EstadoViernes$hora'>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible''>Disponible</option>";
								echo"<option value='Cerrada'>Cerrada</option>";
      							echo"</select>";
								echo"</td>";
							}
							else
							{
								if($vi=='Cerrada')
								{
								echo"<td>";
								echo"<select name='EstadoViernes$hora'>";
								echo"<option value='Cerrada'>Cerrada</option>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible'>Disponible</option>";
								echo"</select>";
								echo"</td>";
								}
							}
						}
        				if($sa=='Disponible')
						{
							echo"<td>";
							echo"<select name='EstadoSabado$hora'>";
							echo"<option value='Disponible'>Disponible</option>";
        					echo"<option value='Ocupada'>Ocupada</option>";
							echo"<option value='Cerrada'>Cerrada</option>";
      						echo"</select>";
							echo"</td>";
						}
						else
						{
							if($sa=='Ocupada')
							{
								echo"<td>";
								echo"<select name='EstadoSabado$hora'>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible''>Disponible</option>";
								echo"<option value='Cerrada'>Cerrada</option>";
      							echo"</select>";
								echo"</td>";
							}
							else
							{
								if($sa=='Cerrada')
								{
								echo"<td>";
								echo"<select name='EstadoSabado$hora'>";
								echo"<option value='Cerrada'>Cerrada</option>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible'>Disponible</option>";
								echo"</select>";
								echo"</td>";	
								}
							}
						}
        				if($do=='Disponible')
						{
							echo"<td>";
							echo"<select name='EstadoDomingo$hora'>";
							echo"<option value='Disponible'>Disponible</option>";
        					echo"<option value='Ocupada'>Ocupada</option>";
							echo"<option value='Cerrada'>Cerrada</option>";
      						echo"</select>";
							echo"</td>";
						}
						else
						{
							if($do=='Ocupada')
							{
								echo"<td>";
								echo"<select name='EstadoDomingo$hora'>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible''>Disponible</option>";
								echo"<option value='Cerrada'>Cerrada</option>";
      							echo"</select>";
								echo"</td>";
							}
							else
							{
								if($do=='Cerrada')
								{
								echo"<td>";
								echo"<select name='EstadoDomingo$hora'>";
								echo"<option value='Cerrada'>Cerrada</option>";
        						echo"<option value='Ocupada'>Ocupada</option>";
        						echo"<option value='Disponible'>Disponible</option>";
								echo"</select>";
								echo"</td>";
								}
							}
						}
        				
        			echo"</tr>";
					$hora=$hora+1;	
					}
			}
			?>
		</table>
     
      
      
      <br>	
      <br>
      <br>
      
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
     <p><button type="submit" class="btn btn-success">Modificar</button></p>
      
    </div>

    
    </form>
    <?php 
	if($_POST){
	 	$codigoCancha=$_POST['codigoCancha'];
	 	$nombre=$_POST['nombre'];
	 	$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
	 	$superficie=$_POST['superficie'];
		
			
		$nombreImg=$_FILES['imagen']['name'];
	 	$archivo=$_FILES['imagen']['tmp_name'];
	 	$ruta="imagenes";
	 	$ruta=$ruta."/".$nombreImg;
	 	move_uploaded_file($archivo,$ruta);	
	 	$ru=$ruta;
		
	 	$EstadoLunes0=$_POST['EstadoLunes0'];
		$EstadoMartes0=$_POST['EstadoMartes0'];
		$EstadoMiercoles0=$_POST['EstadoMiercoles0'];
		$EstadoJueves0=$_POST['EstadoJueves0'];
		$EstadoViernes0=$_POST['EstadoViernes0'];
		$EstadoSabado0=$_POST['EstadoSabado0'];
		$EstadoDomingo0=$_POST['EstadoDomingo0'];
		$EstadoLunes1=$_POST['EstadoLunes1'];
		$EstadoMartes1=$_POST['EstadoMartes1'];
		$EstadoMiercoles1=$_POST['EstadoMiercoles1'];
		$EstadoJueves1=$_POST['EstadoJueves1'];
		$EstadoViernes1=$_POST['EstadoViernes1'];
		$EstadoSabado1=$_POST['EstadoSabado1'];
		$EstadoDomingo1=$_POST['EstadoDomingo1'];
		$EstadoLunes2=$_POST['EstadoLunes2'];
		$EstadoMartes2=$_POST['EstadoMartes2'];
		$EstadoMiercoles2=$_POST['EstadoMiercoles2'];
		$EstadoJueves2=$_POST['EstadoJueves2'];
		$EstadoViernes2=$_POST['EstadoViernes2'];
		$EstadoSabado2=$_POST['EstadoSabado2'];
		$EstadoDomingo2=$_POST['EstadoDomingo2'];
		$EstadoLunes3=$_POST['EstadoLunes3'];
		$EstadoMartes3=$_POST['EstadoMartes3'];
		$EstadoMiercoles3=$_POST['EstadoMiercoles3'];
		$EstadoJueves3=$_POST['EstadoJueves3'];
		$EstadoViernes3=$_POST['EstadoViernes3'];
		$EstadoSabado3=$_POST['EstadoSabado3'];
		$EstadoDomingo3=$_POST['EstadoDomingo3'];
		$EstadoLunes4=$_POST['EstadoLunes4'];
		$EstadoMartes4=$_POST['EstadoMartes4'];
		$EstadoMiercoles4=$_POST['EstadoMiercoles4'];
		$EstadoJueves4=$_POST['EstadoJueves4'];
		$EstadoViernes4=$_POST['EstadoViernes4'];
		$EstadoSabado4=$_POST['EstadoSabado4'];
		$EstadoDomingo4=$_POST['EstadoDomingo4'];
		$EstadoLunes5=$_POST['EstadoLunes5'];
		$EstadoMartes5=$_POST['EstadoMartes5'];
		$EstadoMiercoles5=$_POST['EstadoMiercoles5'];
		$EstadoJueves5=$_POST['EstadoJueves5'];
		$EstadoViernes5=$_POST['EstadoViernes5'];
		$EstadoSabado5=$_POST['EstadoSabado5'];
		$EstadoDomingo5=$_POST['EstadoDomingo5'];
		$EstadoLunes6=$_POST['EstadoLunes6'];
		$EstadoMartes6=$_POST['EstadoMartes6'];
		$EstadoMiercoles6=$_POST['EstadoMiercoles6'];
		$EstadoJueves6=$_POST['EstadoJueves6'];
		$EstadoViernes6=$_POST['EstadoViernes6'];
		$EstadoSabado6=$_POST['EstadoSabado6'];
		$EstadoDomingo6=$_POST['EstadoDomingo6'];
		$EstadoLunes7=$_POST['EstadoLunes7'];
		$EstadoMartes7=$_POST['EstadoMartes7'];
		$EstadoMiercoles7=$_POST['EstadoMiercoles7'];
		$EstadoJueves7=$_POST['EstadoJueves7'];
		$EstadoViernes7=$_POST['EstadoViernes7'];
		$EstadoSabado7=$_POST['EstadoSabado7'];
		$EstadoDomingo7=$_POST['EstadoDomingo7'];
		$EstadoLunes8=$_POST['EstadoLunes8'];
		$EstadoMartes8=$_POST['EstadoMartes8'];
		$EstadoMiercoles8=$_POST['EstadoMiercoles8'];
		$EstadoJueves8=$_POST['EstadoJueves8'];
		$EstadoViernes8=$_POST['EstadoViernes8'];
		$EstadoSabado8=$_POST['EstadoSabado8'];
		$EstadoDomingo8=$_POST['EstadoDomingo8'];
		$EstadoLunes9=$_POST['EstadoLunes9'];
		$EstadoMartes9=$_POST['EstadoMartes9'];
		$EstadoMiercoles9=$_POST['EstadoMiercoles9'];
		$EstadoJueves9=$_POST['EstadoJueves9'];
		$EstadoViernes9=$_POST['EstadoViernes9'];
		$EstadoSabado9=$_POST['EstadoSabado9'];
		$EstadoDomingo9=$_POST['EstadoDomingo9'];
		$EstadoLunes10=$_POST['EstadoLunes10'];
		$EstadoMartes10=$_POST['EstadoMartes10'];
		$EstadoMiercoles10=$_POST['EstadoMiercoles10'];
		$EstadoJueves10=$_POST['EstadoJueves10'];
		$EstadoViernes10=$_POST['EstadoViernes10'];
		$EstadoSabado10=$_POST['EstadoSabado10'];
		$EstadoDomingo10=$_POST['EstadoDomingo10'];
		$EstadoLunes11=$_POST['EstadoLunes11'];
		$EstadoMartes11=$_POST['EstadoMartes11'];
		$EstadoMiercoles11=$_POST['EstadoMiercoles11'];
		$EstadoJueves11=$_POST['EstadoJueves11'];
		$EstadoViernes11=$_POST['EstadoViernes11'];
		$EstadoSabado11=$_POST['EstadoSabado11'];
		$EstadoDomingo11=$_POST['EstadoDomingo11'];
		$EstadoLunes12=$_POST['EstadoLunes12'];
		$EstadoMartes12=$_POST['EstadoMartes12'];
		$EstadoMiercoles12=$_POST['EstadoMiercoles12'];
		$EstadoJueves12=$_POST['EstadoJueves12'];
		$EstadoViernes12=$_POST['EstadoViernes12'];
		$EstadoSabado12=$_POST['EstadoSabado12'];
		$EstadoDomingo12=$_POST['EstadoDomingo12'];
		$EstadoLunes13=$_POST['EstadoLunes13'];
		$EstadoMartes13=$_POST['EstadoMartes13'];
		$EstadoMiercoles13=$_POST['EstadoMiercoles13'];
		$EstadoJueves13=$_POST['EstadoJueves13'];
		$EstadoViernes13=$_POST['EstadoViernes13'];
		$EstadoSabado13=$_POST['EstadoSabado13'];
		$EstadoDomingo13=$_POST['EstadoDomingo13'];
		$EstadoLunes14=$_POST['EstadoLunes14'];
		$EstadoMartes14=$_POST['EstadoMartes14'];
		$EstadoMiercoles14=$_POST['EstadoMiercoles14'];
		$EstadoJueves14=$_POST['EstadoJueves14'];
		$EstadoViernes14=$_POST['EstadoViernes14'];
		$EstadoSabado14=$_POST['EstadoSabado14'];
		$EstadoDomingo14=$_POST['EstadoDomingo14'];
		$EstadoLunes15=$_POST['EstadoLunes15'];
		$EstadoMartes15=$_POST['EstadoMartes15'];
		$EstadoMiercoles15=$_POST['EstadoMiercoles15'];
		$EstadoJueves15=$_POST['EstadoJueves15'];
		$EstadoViernes15=$_POST['EstadoViernes15'];
		$EstadoSabado15=$_POST['EstadoSabado15'];
		$EstadoDomingo15=$_POST['EstadoDomingo15'];
		$EstadoLunes16=$_POST['EstadoLunes16'];
		$EstadoMartes16=$_POST['EstadoMartes16'];
		$EstadoMiercoles16=$_POST['EstadoMiercoles16'];
		$EstadoJueves16=$_POST['EstadoJueves16'];
		$EstadoViernes16=$_POST['EstadoViernes16'];
		$EstadoSabado16=$_POST['EstadoSabado16'];
		$EstadoDomingo16=$_POST['EstadoDomingo16'];
		$EstadoLunes17=$_POST['EstadoLunes17'];
		$EstadoMartes17=$_POST['EstadoMartes17'];
		$EstadoMiercoles17=$_POST['EstadoMiercoles17'];
		$EstadoJueves17=$_POST['EstadoJueves17'];
		$EstadoViernes17=$_POST['EstadoViernes17'];
		$EstadoSabado17=$_POST['EstadoSabado17'];
		$EstadoDomingo17=$_POST['EstadoDomingo17'];
		$EstadoLunes18=$_POST['EstadoLunes18'];
		$EstadoMartes18=$_POST['EstadoMartes18'];
		$EstadoMiercoles18=$_POST['EstadoMiercoles18'];
		$EstadoJueves18=$_POST['EstadoJueves18'];
		$EstadoViernes18=$_POST['EstadoViernes18'];
		$EstadoSabado18=$_POST['EstadoSabado18'];
		$EstadoDomingo18=$_POST['EstadoDomingo18'];
		$EstadoLunes19=$_POST['EstadoLunes19'];
		$EstadoMartes19=$_POST['EstadoMartes19'];
		$EstadoMiercoles19=$_POST['EstadoMiercoles19'];
		$EstadoJueves19=$_POST['EstadoJueves19'];
		$EstadoViernes19=$_POST['EstadoViernes19'];
		$EstadoSabado19=$_POST['EstadoSabado19'];
		$EstadoDomingo19=$_POST['EstadoDomingo19'];
		$EstadoLunes20=$_POST['EstadoLunes20'];
		$EstadoMartes20=$_POST['EstadoMartes20'];
		$EstadoMiercoles20=$_POST['EstadoMiercoles20'];
		$EstadoJueves20=$_POST['EstadoJueves20'];
		$EstadoViernes20=$_POST['EstadoViernes20'];
		$EstadoSabado20=$_POST['EstadoSabado20'];
		$EstadoDomingo20=$_POST['EstadoDomingo20'];
		$EstadoLunes21=$_POST['EstadoLunes21'];
		$EstadoMartes21=$_POST['EstadoMartes21'];
		$EstadoMiercoles21=$_POST['EstadoMiercoles21'];
		$EstadoJueves21=$_POST['EstadoJueves21'];
		$EstadoViernes21=$_POST['EstadoViernes21'];
		$EstadoSabado21=$_POST['EstadoSabado21'];
		$EstadoDomingo21=$_POST['EstadoDomingo21'];
		$EstadoLunes22=$_POST['EstadoLunes22'];
		$EstadoMartes22=$_POST['EstadoMartes22'];
		$EstadoMiercoles22=$_POST['EstadoMiercoles22'];
		$EstadoJueves22=$_POST['EstadoJueves22'];
		$EstadoViernes22=$_POST['EstadoViernes22'];
		$EstadoSabado22=$_POST['EstadoSabado22'];
		$EstadoDomingo22=$_POST['EstadoDomingo22'];
		$EstadoLunes23=$_POST['EstadoLunes23'];
		$EstadoMartes23=$_POST['EstadoMartes23'];
		$EstadoMiercoles23=$_POST['EstadoMiercoles23'];
		$EstadoJueves23=$_POST['EstadoJueves23'];
		$EstadoViernes23=$_POST['EstadoViernes23'];
		$EstadoSabado23=$_POST['EstadoSabado23'];
		$EstadoDomingo23=$_POST['EstadoDomingo23'];
		modificarCancha($codigoCancha,$nombre,$direccion,$telefono,$superficie,$ru,$EstadoLunes0,$EstadoMartes0,$EstadoMiercoles0,$EstadoJueves0,$EstadoViernes0,$EstadoSabado0,$EstadoDomingo0,$EstadoLunes1,$EstadoMartes1,$EstadoMiercoles1,$EstadoJueves1,$EstadoViernes1,$EstadoSabado1,$EstadoDomingo1,$EstadoLunes2,$EstadoMartes2,$EstadoMiercoles2,$EstadoJueves2,$EstadoViernes2,$EstadoSabado2,$EstadoDomingo2,$EstadoLunes3,$EstadoMartes3,$EstadoMiercoles3,$EstadoJueves3,$EstadoViernes3,$EstadoSabado3,$EstadoDomingo3,$EstadoLunes4,$EstadoMartes4,$EstadoMiercoles4,$EstadoJueves4,$EstadoViernes4,$EstadoSabado4,$EstadoDomingo4,$EstadoLunes5,$EstadoMartes5,$EstadoMiercoles5,$EstadoJueves5,$EstadoViernes5,$EstadoSabado5,$EstadoDomingo5,$EstadoLunes6,$EstadoMartes6,$EstadoMiercoles6,$EstadoJueves6,$EstadoViernes6,$EstadoSabado6,$EstadoDomingo6,$EstadoLunes7,$EstadoMartes7,$EstadoMiercoles7,$EstadoJueves7,$EstadoViernes7,$EstadoSabado7,$EstadoDomingo7,$EstadoLunes8,$EstadoMartes8,$EstadoMiercoles8,$EstadoJueves8,$EstadoViernes8,$EstadoSabado8,$EstadoDomingo8,$EstadoLunes9,$EstadoMartes9,$EstadoMiercoles9,$EstadoJueves9,$EstadoViernes9,$EstadoSabado9,$EstadoDomingo9,$EstadoLunes10,$EstadoMartes10,$EstadoMiercoles10,$EstadoJueves10,$EstadoViernes10,$EstadoSabado10,$EstadoDomingo10,$EstadoLunes11,$EstadoMartes11,$EstadoMiercoles11,$EstadoJueves11,$EstadoViernes11,$EstadoSabado11,$EstadoDomingo11,$EstadoLunes12,$EstadoMartes12,$EstadoMiercoles12,$EstadoJueves12,$EstadoViernes12,$EstadoSabado12,$EstadoDomingo12,$EstadoLunes13,$EstadoMartes13,$EstadoMiercoles13,$EstadoJueves13,$EstadoViernes13,$EstadoSabado13,$EstadoDomingo13,$EstadoLunes14,$EstadoMartes14,$EstadoMiercoles14,$EstadoJueves14,$EstadoViernes14,$EstadoSabado14,$EstadoDomingo14,$EstadoLunes15,$EstadoMartes15,$EstadoMiercoles15,$EstadoJueves15,$EstadoViernes15,$EstadoSabado15,$EstadoDomingo15,$EstadoLunes16,$EstadoMartes16,$EstadoMiercoles16,$EstadoJueves16,$EstadoViernes16,$EstadoSabado16,$EstadoDomingo16,$EstadoLunes17,$EstadoMartes17,$EstadoMiercoles17,$EstadoJueves17,$EstadoViernes17,$EstadoSabado17,$EstadoDomingo17,$EstadoLunes18,$EstadoMartes18,$EstadoMiercoles18,$EstadoJueves18,$EstadoViernes18,$EstadoSabado18,$EstadoDomingo18,$EstadoLunes19,$EstadoMartes19,$EstadoMiercoles19,$EstadoJueves19,$EstadoViernes19,$EstadoSabado19,$EstadoDomingo19,$EstadoLunes20,$EstadoMartes20,$EstadoMiercoles20,$EstadoJueves20,$EstadoViernes20,$EstadoSabado20,$EstadoDomingo20,$EstadoLunes21,$EstadoMartes21,$EstadoMiercoles21,$EstadoJueves21,$EstadoViernes21,$EstadoSabado21,$EstadoDomingo21,$EstadoLunes22,$EstadoMartes22,$EstadoMiercoles22,$EstadoJueves22,$EstadoViernes22,$EstadoSabado22,$EstadoDomingo22,$EstadoLunes23,$EstadoMartes23,$EstadoMiercoles23,$EstadoJueves23,$EstadoViernes23,$EstadoSabado23,$EstadoDomingo23);
	}
	 ?>
    
     
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