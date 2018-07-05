<?php
require 'conexion.php';

$cancha=$_POST['cancha'];
$hora=$_POST['horarios'];
$hora2=$_POST['horarios2'];
$dia=$_POST['dia'];

$nombres=$_POST['nombres'];
$rut=$_POST['rut'];
$ap=$_POST['apellidoP'];
$am=$_POST['apellidoM'];
$telefono=$_POST['tel'];
$correo=$_POST['correo'];



$nombreCancha="";
$diaSelec="";
$mesaje="";

if ($hora >= $hora2){
	
	echo "<script>alert('la hora de comienzo no puede ser mayor a la de termino');</script>";
	die(header('Location: ReservaCancha.php'));
		
}
else{

$sql = "select * from estado where codigoCancha='"."$cancha"."' and hora ='"."$hora"."'";
$resultado= $mysqli->query($sql);
if((mysqli_num_rows($resultado)>0)){
	while($row = $resultado->fetch_assoc()){ 
	  $diaSelec=$row[($dia)];
	}
	
	 if($diaSelec == 'Ocupada'){
			echo "<script>alert('hora de inicio ocupada');</script>";
			header('Location: ReservaCancha.php');
	 }
	  else{
		$sql2 = "select * from estado where codigoCancha='"."$cancha"."' and hora ='"."$hora2"."'";
		$resultado2= $mysqli->query($sql2);
		if((mysqli_num_rows($resultado2)>0)){
			 while($row2 = $resultado2->fetch_assoc()){ 
			   $diaSelec=$row2[($dia)];
			 }
			 if($diaSelec == 'Ocupada'){
				echo "<script>alert('Hora de termino ocupada');</script>";
				header('Location: ReservaCancha.php');
			 }
			 else{
				    $sql2 = "select * from cancha where codigoCancha='"."$cancha"."'";
				  	$resultado2= $mysqli->query($sql2);
					 while($row2 = $resultado2->fetch_assoc()){ 
				     $nombreCancha=$row2['nombre'];
						}
					
				 	$mail= "noreplyformulariosvald@gmail.com";
					$mesaje ="Nombre: " . $nombres . "\nApellidos: " . $ap ." " .$am. "\nTelefono: ".$telefono."\nRut:".$rut."\n";
					$asunto= "Confirmacion Reserva";
					$asunto2= "Reserva Realizada";
					$mesaje2= "Estimado ".$nombreCancha."\nLa solicitud fue enviada. Para completar la operacion debera depositar una suma de $3.000 pesos, por motivos de reserva.
					\nSucursal solicitada: ".$nombres."\nHora de Inicio: " . $hora . " horas\nHora de termino:" . $hora2 . " horas\nDia arriendo:" . $dia . " 
					\nDepositar a la siguiente cuenta\nBanco:Santander\nNumero de Cuenta:00000050451\nCuenta Corriente\nNombre:Juan Perez\nCorreo electronico:noreplyformulariosvald@gmail.com\nSaldo a transferir:3.000 CLP
					\nRecuerde enviar enviar el comprobante por medio de su banco, sino puede enviar la copia por el mismo correo.
					
					
					 ";
					if(mail($mail,$asunto2,$mesaje))
					{
						 mail($correo,$asunto,$mesaje2);
						 echo "<script>alert('Enviado');</script>";
						 header('Location: PaginaPrincipal.php');
					}
					else{
						echo "<script>alert('No se pudo enviar el mail, por favor verifique su configuracion de correo SMTP saliente.');</script>";
						header('Location: ReservaCancha.php');
					}
				 }
		 }
	  }
   }	
}

		
	
	
	?>