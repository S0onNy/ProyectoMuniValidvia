<?php error_reporting(E_ERROR | E_WARNING | E_PARSE);

function conectarse(){
    $conn =mysqli_connect("localhost","root","","muni");
	
	if(!$conn)
	{
		    die("error de conexion: " . mysqli_connect_error($conn));
			
	}
	else
	{
		
		return $conn;
	}
}

function formulario($nombres,$rut,$ap,$am,$telefono,$mesaje,$correo,$as){
	$mail= "noreplyformulariosvald@gmail.com";
	$mesaje ="Nombre: " . $nombres . "\nApellidos: " . $ap ."" .$am. "\nTelefono: ".$telefono."\nRut:".$rut."\n" .$mesaje ;
	$asunto= $as. "recibido";
	$mesaje2= "Estimado ".$nombres."\nMuchas gracias por contactarse con nosotros, su formulario sera constestado a la brevedad ";
	if(mail($mail,$as,$mesaje))
	{
		 mail($correo,$asunto,$mesaje2);
	    echo "<script>alert('Enviado');</script>";
		
    }
	else{
    	echo "<script>alert('No se pudo enviar el mail, por favor verifique su configuracion de correo SMTP saliente.');</script>";
    }

}

function validarIngreso($usuario,$pass){
	$con=conectarse();
	$sql="select * from usuarios where administrador = '"."$usuario"."' and pass ='"."$pass"."'";
	$rs=mysqli_query($con,$sql);
	if(mysqli_num_rows($rs)>0){
		header('Location: PaginaPrincipalAdministracion.php');	
	}
	else{
		 header('Location: Login.php');
	}
}

function mostrarCanchas(){
	$con=conectarse();
	$sql="select * from cancha";
	$rs=mysqli_query($con,$sql);
	if(mysqli_num_rows($rs)>0){
		
	while($fila =mysqli_fetch_assoc($rs))
	{
		$resultados=$resultados+1;
		
		$cCancha=$fila["codigoCancha"];	
        echo " <hr class='featurette-divider'>";

		echo "  <div class='row featurette' align='left'>";
		echo "  <div class='col-md-7'>";
		
        echo "  <h2 class='featurette-heading'>".$fila["nombre"]."</h2>";
		echo "  <p class='lead'><b>Dirección: </b>".$fila["direccion"]."</p>";
		echo "  <p class='lead'><b>Fono contacto: </b>".$fila["telefono"]."</p>";
		echo "  <p class='lead'><b>Superficie: </b>".$fila["superficie"]."</p>";
		
		echo "  <b>Horario:</b><br>";
		$con2=conectarse();
		$sql2="select estado.hora ,estado.lunes ,estado.martes ,estado.miercoles ,estado.jueves ,estado.viernes ,estado.sabado ,estado.domingo,cancha.imagen from estado inner join cancha ON estado.codigoCancha=cancha.codigoCancha where cancha.codigoCancha='"."$cCancha"."'";
		$rs2=mysqli_query($con2,$sql2);
		echo "<div class='table-responsive'> " ;
		echo"<table class='table table-sm table-dark' border=1";
            echo"<tr>";
                echo"<th>Hora</th>";
                echo"<th>Lunes</th>";
                echo"<th>Martes</th>";
                echo"<th>Miercoles</th>";
                echo"<th>Jueves</th>";
                echo"<th>Viernes</th>";
                echo"<th>Sabado</th>";
               echo"<th>Domingo</th>";
           echo" </tr>";
		while($fila2 =mysqli_fetch_assoc($rs2))
		{
			
           echo" <tr>";
            echo"    <td>".$fila2["hora"].":00</td>";
             echo"   <td>".$fila2["lunes"]."</td>";
              echo"  <td>".$fila2["martes"]."</td>";
              echo"  <td>".$fila2["miercoles"]."</td>";
              echo"  <td>".$fila2["jueves"]."</td>";
              echo"  <td>".$fila2["viernes"]."</td>";
              echo"  <td>".$fila2["sabado"]."</td>";
              echo"  <td>".$fila2["domingo"]."</td>";
           echo" </tr>";
		    
			$img=$fila["imagen"];
		}
       echo" </table>";
		echo "</div>"; 
		echo" <br>";
	     echo" <br>";
		
		
		echo "  </div>";
         
        
		echo "	<div class='col-md-5'>";
		echo " <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <img class='featurette-image img-responsive center-block' data-src='holder.js/500x500/auto' width='500' height='400' alt='500x500' src='".$img."'>";
		echo " 	</div>";
		echo " 	</div>";
		
		

		
		
                  	
    	
		
	}
	
      
	}else{
		echo "Error inesperado";
	}
}

function insertarCancha($nombre,$direccion,$telefono,$superficie,$ru){
	
	$con=conectarse();
	$estado="Disponible";
	$val =mt_rand(100000,999999);
	$val2 =mt_rand(100000,999999);
	$sql="select * from cancha where codigoCancha = '"."$val"."' ";
	$rs=mysqli_query($con,$sql);
	if(!(mysqli_num_rows($rs)>0))
	{
		
		$con2=conectarse();
		$sql2="select * from estado where id = '"."$val2"."' ";
		$rs2=mysqli_query($con2,$sql2);
		if(!(mysqli_num_rows($rs2)>0))
		{
			$con3=conectarse();
			$sql3="insert into cancha values ('"."$val"."','"."$nombre"."','"."$direccion"."',"."$telefono".",'"."$superficie"."','"."$ru"."')";
			
			if(mysqli_query($con3,$sql3))
			{
				$hora=0;
				for ($i = 1; $i <= 24; $i++)
				{
					
    				$con4=conectarse();
					$sql4="insert into estado values ('"."$val2"."','"."$hora"."','Disponible','Disponible','Disponible','Disponible','Disponible','Disponible','Disponible','"."$val"."')";
					if(mysqli_query($con4,$sql4))
						{	

		                   

					
						}
						else
					{
							echo "<script>alert('Error');</script>";
						}
					
					$hora=$hora+1;
					$val2=$val2+1;
					
				}
				
				echo "<script>alert('Inserccion exitosa, codigo de cancha:  "."$val"." ' );</script>";
			}
			else
			{
				echo "<script>alert('Error');</script>";
			}
		}
		else
		{
			echo "<script>alert('Error inesperado, vuelva a intentarlo');</script>";

		}
	  

		
	 

		}
		else
	{
		echo "<script>alert('Error inesperado, vuelva a intentarlo');</script>";
	}
	
	
}

function listadoCancha(){
	$con=conectarse();
	$sql="select * from cancha";
	$rs=mysqli_query($con,$sql);
	if(mysqli_num_rows($rs)>0)
	{
		echo "<div class='table-responsive'> " ;
		echo"<table class='table' border=1";
            echo"<tr>";
                echo"<th>Código</th>";
                echo"<th>Nombre</th>";
                echo"<th>Dirección</th>";
                echo"<th>Superficie</th>";
           echo" </tr>";
		while($fila =mysqli_fetch_assoc($rs))
		{
           echo" <tr>";
            echo"    <td>".$fila["codigoCancha"]."</td>";
             echo"   <td>".$fila["nombre"]."</td>";
              echo"  <td>".$fila["direccion"]."</td>";
              echo"  <td>".$fila["superficie"]."</td>";
              echo" </tr>";
		}
       echo" </table>";
		echo "</div>";  
	}
		else
	{
		echo "<script>alert('Error inesperado');</script>";
	}
	
	
}

function verificarCancha($codigoEnviar){
	$con=conectarse();
	$sql="select * from cancha where codigoCancha = '"."$codigoEnviar"."'";
	$rs=mysqli_query($con,$sql);
	if(mysqli_num_rows($rs)>0){
		glo($codigoEnviar);
	    header('Location: ModificarCancha.php');
	}
	else{
		
		
		echo "<script>alert('Cancha no existe');</script>";
		
	}
}


function glo($var){
	$con = conectarse();
	
	$sql = "insert into variable values ('"."$var"."')";
	if(mysqli_query($con,$sql)){
		
	}else{
		
	}
}
function globa(){
	$con = conectarse();
	$sql = "select * from variable";
	$rs=mysqli_query($con,$sql);
	if(mysqli_num_rows($rs)>0){
		while($fila =mysqli_fetch_assoc($rs)){
			return $fila["var"];
		}
	}
	else{
		
	}
}
function vaciar(){
	$con=conectarse();
	$sql = "delete from variable";
	if(mysqli_query($con,$sql)){
		
	}else{
		
	}
}

function modificarCancha($codigoCancha,$nombre,$direccion,$telefono,$superficie,$ru,$EstadoLunes0,$EstadoMartes0,$EstadoMiercoles0,$EstadoJueves0,$EstadoViernes0,$EstadoSabado0,$EstadoDomingo0,$EstadoLunes1,$EstadoMartes1,$EstadoMiercoles1,$EstadoJueves1,$EstadoViernes1,$EstadoSabado1,$EstadoDomingo1,$EstadoLunes2,$EstadoMartes2,$EstadoMiercoles2,$EstadoJueves2,$EstadoViernes2,$EstadoSabado2,$EstadoDomingo2,$EstadoLunes3,$EstadoMartes3,$EstadoMiercoles3,$EstadoJueves3,$EstadoViernes3,$EstadoSabado3,$EstadoDomingo3,$EstadoLunes4,$EstadoMartes4,$EstadoMiercoles4,$EstadoJueves4,$EstadoViernes4,$EstadoSabado4,$EstadoDomingo4,$EstadoLunes5,$EstadoMartes5,$EstadoMiercoles5,$EstadoJueves5,$EstadoViernes5,$EstadoSabado5,$EstadoDomingo5,$EstadoLunes6,$EstadoMartes6,$EstadoMiercoles6,$EstadoJueves6,$EstadoViernes6,$EstadoSabado6,$EstadoDomingo6,$EstadoLunes7,$EstadoMartes7,$EstadoMiercoles7,$EstadoJueves7,$EstadoViernes7,$EstadoSabado7,$EstadoDomingo7,$EstadoLunes8,$EstadoMartes8,$EstadoMiercoles8,$EstadoJueves8,$EstadoViernes8,$EstadoSabado8,$EstadoDomingo8,$EstadoLunes9,$EstadoMartes9,$EstadoMiercoles9,$EstadoJueves9,$EstadoViernes9,$EstadoSabado9,$EstadoDomingo9,$EstadoLunes10,$EstadoMartes10,$EstadoMiercoles10,$EstadoJueves10,$EstadoViernes10,$EstadoSabado10,$EstadoDomingo10,$EstadoLunes11,$EstadoMartes11,$EstadoMiercoles11,$EstadoJueves11,$EstadoViernes11,$EstadoSabado11,$EstadoDomingo11,$EstadoLunes12,$EstadoMartes12,$EstadoMiercoles12,$EstadoJueves12,$EstadoViernes12,$EstadoSabado12,$EstadoDomingo12,$EstadoLunes13,$EstadoMartes13,$EstadoMiercoles13,$EstadoJueves13,$EstadoViernes13,$EstadoSabado13,$EstadoDomingo13,$EstadoLunes14,$EstadoMartes14,$EstadoMiercoles14,$EstadoJueves14,$EstadoViernes14,$EstadoSabado14,$EstadoDomingo14,$EstadoLunes15,$EstadoMartes15,$EstadoMiercoles15,$EstadoJueves15,$EstadoViernes15,$EstadoSabado15,$EstadoDomingo15,$EstadoLunes16,$EstadoMartes16,$EstadoMiercoles16,$EstadoJueves16,$EstadoViernes16,$EstadoSabado16,$EstadoDomingo16,$EstadoLunes17,$EstadoMartes17,$EstadoMiercoles17,$EstadoJueves17,$EstadoViernes17,$EstadoSabado17,$EstadoDomingo17,$EstadoLunes18,$EstadoMartes18,$EstadoMiercoles18,$EstadoJueves18,$EstadoViernes18,$EstadoSabado18,$EstadoDomingo18,$EstadoLunes19,$EstadoMartes19,$EstadoMiercoles19,$EstadoJueves19,$EstadoViernes19,$EstadoSabado19,$EstadoDomingo19,$EstadoLunes20,$EstadoMartes20,$EstadoMiercoles20,$EstadoJueves20,$EstadoViernes20,$EstadoSabado20,$EstadoDomingo20,$EstadoLunes21,$EstadoMartes21,$EstadoMiercoles21,$EstadoJueves21,$EstadoViernes21,$EstadoSabado21,$EstadoDomingo21,$EstadoLunes22,$EstadoMartes22,$EstadoMiercoles22,$EstadoJueves22,$EstadoViernes22,$EstadoSabado22,$EstadoDomingo22,$EstadoLunes23,$EstadoMartes23,$EstadoMiercoles23,$EstadoJueves23,$EstadoViernes23,$EstadoSabado23,$EstadoDomingo23)
{
	
	if($ru=='imagenes/')
	{
		$con7=conectarse();
		$sql7="select * from cancha where codigoCancha = '"."$codigoCancha"."'";
		$rs7=mysqli_query($con7,$sql7);
		if(mysqli_num_rows($rs7)>0){
		while($fila7 =mysqli_fetch_assoc($rs7)){
			$ru = $fila7['imagen'];		
			
		}			
	}
      	
	}
	else
	{
		$ru=$ru;
	}
	

	$con=conectarse();
	$sql="update cancha set nombre='"."$nombre"."',direccion='"."$direccion"."',telefono="."$telefono".",superficie='"."$superficie"."',imagen='"."$ru"."' where codigoCancha = '"."$codigoCancha"."'";
	if(mysqli_query($con,$sql)){
		$hora=0;
		
		for ($i = 1; $i <= 24; $i++)
			{
				if($hora==0)
				{
					$EstadoLunes=$EstadoLunes0;
					$EstadoMartes=$EstadoMartes0;
					$EstadoMiercoles=$EstadoMiercoles0;
					$EstadoJueves=$EstadoJueves0;
					$EstadoViernes=$EstadoViernes0;
					$EstadoSabado=$EstadoSabado0;
					$EstadoDomingo=$EstadoDomingo0;
				}
				else
				{
					if($hora==1)
				{
					$EstadoLunes=$EstadoLunes1;
					$EstadoMartes=$EstadoMartes1;
					$EstadoMiercoles=$EstadoMiercoles1;
					$EstadoJueves=$EstadoJueves1;
					$EstadoViernes=$EstadoViernes1;
					$EstadoSabado=$EstadoSabado1;
					$EstadoDomingo=$EstadoDomingo1;
				}
				else
				{
					if($hora==2)
				{
					$EstadoLunes=$EstadoLunes2;
					$EstadoMartes=$EstadoMartes2;
					$EstadoMiercoles=$EstadoMiercoles2;
					$EstadoJueves=$EstadoJueves2;
					$EstadoViernes=$EstadoViernes2;
					$EstadoSabado=$EstadoSabado2;
					$EstadoDomingo=$EstadoDomingo2;
				}
				else
				{
					if($hora==3)
				{
					$EstadoLunes=$EstadoLunes3;
					$EstadoMartes=$EstadoMartes3;
					$EstadoMiercoles=$EstadoMiercoles3;
					$EstadoJueves=$EstadoJueves3;
					$EstadoViernes=$EstadoViernes3;
					$EstadoSabado=$EstadoSabado3;
					$EstadoDomingo=$EstadoDomingo3;
				}
				else
				{
					if($hora==4)
				{
					$EstadoLunes=$EstadoLunes4;
					$EstadoMartes=$EstadoMartes4;
					$EstadoMiercoles=$EstadoMiercoles4;
					$EstadoJueves=$EstadoJueves4;
					$EstadoViernes=$EstadoViernes4;
					$EstadoSabado=$EstadoSabado4;
					$EstadoDomingo=$EstadoDomingo4;
				}
				else
				{
					if($hora==5)
				{
					$EstadoLunes=$EstadoLunes5;
					$EstadoMartes=$EstadoMartes5;
					$EstadoMiercoles=$EstadoMiercoles5;
					$EstadoJueves=$EstadoJueves5;
					$EstadoViernes=$EstadoViernes5;
					$EstadoSabado=$EstadoSabado5;
					$EstadoDomingo=$EstadoDomingo5;
				}
				else
				{
					if($hora==6)
				{
					$EstadoLunes=$EstadoLunes6;
					$EstadoMartes=$EstadoMartes6;
					$EstadoMiercoles=$EstadoMiercoles6;
					$EstadoJueves=$EstadoJueves6;
					$EstadoViernes=$EstadoViernes6;
					$EstadoSabado=$EstadoSabado6;
					$EstadoDomingo=$EstadoDomingo6;
				}
				else
				{
					if($hora==7)
				{
					$EstadoLunes=$EstadoLunes7;
					$EstadoMartes=$EstadoMartes7;
					$EstadoMiercoles=$EstadoMiercoles7;
					$EstadoJueves=$EstadoJueves7;
					$EstadoViernes=$EstadoViernes7;
					$EstadoSabado=$EstadoSabado7;
					$EstadoDomingo=$EstadoDomingo7;
				}
				else
				{
					if($hora==8)
				{
					$EstadoLunes=$EstadoLunes8;
					$EstadoMartes=$EstadoMartes8;
					$EstadoMiercoles=$EstadoMiercoles8;
					$EstadoJueves=$EstadoJueves8;
					$EstadoViernes=$EstadoViernes8;
					$EstadoSabado=$EstadoSabado8;
					$EstadoDomingo=$EstadoDomingo8;
				}
				else
				{
					if($hora==9)
				{
					$EstadoLunes=$EstadoLunes9;
					$EstadoMartes=$EstadoMartes9;
					$EstadoMiercoles=$EstadoMiercoles9;
					$EstadoJueves=$EstadoJueves9;
					$EstadoViernes=$EstadoViernes9;
					$EstadoSabado=$EstadoSabado9;
					$EstadoDomingo=$EstadoDomingo9;
				}
				else
				{
					if($hora==10)
				{
					$EstadoLunes=$EstadoLunes10;
					$EstadoMartes=$EstadoMartes10;
					$EstadoMiercoles=$EstadoMiercoles10;
					$EstadoJueves=$EstadoJueves10;
					$EstadoViernes=$EstadoViernes10;
					$EstadoSabado=$EstadoSabado10;
					$EstadoDomingo=$EstadoDomingo10;
				}
				else
				{
					if($hora==11)
				{
					$EstadoLunes=$EstadoLunes11;
					$EstadoMartes=$EstadoMartes11;
					$EstadoMiercoles=$EstadoMiercoles11;
					$EstadoJueves=$EstadoJueves11;
					$EstadoViernes=$EstadoViernes11;
					$EstadoSabado=$EstadoSabado11;
					$EstadoDomingo=$EstadoDomingo11;
				}
				else
				{
					if($hora==12)
				{
					$EstadoLunes=$EstadoLunes12;
					$EstadoMartes=$EstadoMartes12;
					$EstadoMiercoles=$EstadoMiercoles12;
					$EstadoJueves=$EstadoJueves12;
					$EstadoViernes=$EstadoViernes12;
					$EstadoSabado=$EstadoSabado12;
					$EstadoDomingo=$EstadoDomingo12;
				}
				else

				{
					if($hora==13)
				{
					$EstadoLunes=$EstadoLunes13;
					$EstadoMartes=$EstadoMartes13;
					$EstadoMiercoles=$EstadoMiercoles13;
					$EstadoJueves=$EstadoJueves13;
					$EstadoViernes=$EstadoViernes13;
					$EstadoSabado=$EstadoSabado13;
					$EstadoDomingo=$EstadoDomingo13;
				}
				else
				{
					if($hora==14)
				{
					$EstadoLunes=$EstadoLunes14;
					$EstadoMartes=$EstadoMartes14;
					$EstadoMiercoles=$EstadoMiercoles14;
					$EstadoJueves=$EstadoJueves14;
					$EstadoViernes=$EstadoViernes14;
					$EstadoSabado=$EstadoSabado14;
					$EstadoDomingo=$EstadoDomingo14;
				}
				else
				{
					if($hora==15)
				{
					$EstadoLunes=$EstadoLunes15;
					$EstadoMartes=$EstadoMartes15;
					$EstadoMiercoles=$EstadoMiercoles15;
					$EstadoJueves=$EstadoJueves15;
					$EstadoViernes=$EstadoViernes15;
					$EstadoSabado=$EstadoSabado15;
					$EstadoDomingo=$EstadoDomingo15;
				}
				else
				{
					if($hora==16)
				{
					$EstadoLunes=$EstadoLunes16;
					$EstadoMartes=$EstadoMartes16;
					$EstadoMiercoles=$EstadoMiercoles16;
					$EstadoJueves=$EstadoJueves16;
					$EstadoViernes=$EstadoViernes16;
					$EstadoSabado=$EstadoSabado16;
					$EstadoDomingo=$EstadoDomingo16;
				}
				else
				{
					if($hora==17)
				{
					$EstadoLunes=$EstadoLunes17;
					$EstadoMartes=$EstadoMartes17;
					$EstadoMiercoles=$EstadoMiercoles17;
					$EstadoJueves=$EstadoJueves17;
					$EstadoViernes=$EstadoViernes17;
					$EstadoSabado=$EstadoSabado17;
					$EstadoDomingo=$EstadoDomingo17;
				}
				else
				{
					if($hora==18)
				{
					$EstadoLunes=$EstadoLunes18;
					$EstadoMartes=$EstadoMartes18;
					$EstadoMiercoles=$EstadoMiercoles18;
					$EstadoJueves=$EstadoJueves18;
					$EstadoViernes=$EstadoViernes18;
					$EstadoSabado=$EstadoSabado18;
					$EstadoDomingo=$EstadoDomingo18;
				}
				else
				{
					if($hora==19)
				{
					$EstadoLunes=$EstadoLunes19;
					$EstadoMartes=$EstadoMartes19;
					$EstadoMiercoles=$EstadoMiercoles19;
					$EstadoJueves=$EstadoJueves19;
					$EstadoViernes=$EstadoViernes19;
					$EstadoSabado=$EstadoSabado19;
					$EstadoDomingo=$EstadoDomingo19;
				}
				else
				{
					if($hora==20)
				{
					$EstadoLunes=$EstadoLunes20;
					$EstadoMartes=$EstadoMartes20;
					$EstadoMiercoles=$EstadoMiercoles20;
					$EstadoJueves=$EstadoJueves20;
					$EstadoViernes=$EstadoViernes20;
					$EstadoSabado=$EstadoSabado20;
					$EstadoDomingo=$EstadoDomingo20;
				}
				else
				{
					if($hora==21)
				{
					$EstadoLunes=$EstadoLunes21;
					$EstadoMartes=$EstadoMartes21;
					$EstadoMiercoles=$EstadoMiercoles21;
					$EstadoJueves=$EstadoJueves21;
					$EstadoViernes=$EstadoViernes21;
					$EstadoSabado=$EstadoSabado21;
					$EstadoDomingo=$EstadoDomingo21;
				}
				else
				{
					if($hora==22)
				{
					$EstadoLunes=$EstadoLunes22;
					$EstadoMartes=$EstadoMartes22;
					$EstadoMiercoles=$EstadoMiercoles22;
					$EstadoJueves=$EstadoJueves22;
					$EstadoViernes=$EstadoViernes22;
					$EstadoSabado=$EstadoSabado22;
					$EstadoDomingo=$EstadoDomingo22;
				}
				else
				{
					if($hora==23)
				{
					$EstadoLunes=$EstadoLunes23;
					$EstadoMartes=$EstadoMartes23;
					$EstadoMiercoles=$EstadoMiercoles23;
					$EstadoJueves=$EstadoJueves23;
					$EstadoViernes=$EstadoViernes23;
					$EstadoSabado=$EstadoSabado23;
					$EstadoDomingo=$EstadoDomingo23;
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				}
				
				$con2=conectarse();
				$sql2="update estado set lunes='"."$EstadoLunes"."', martes='"."$EstadoMartes"."', miercoles='"."$EstadoMiercoles"."', jueves='"."$EstadoJueves"."', viernes='"."$EstadoViernes"."', sabado='"."$EstadoSabado"."', domingo='"."$EstadoDomingo"."' where codigoCancha = '"."$codigoCancha"."' AND hora='"."$hora"."'";

				if(mysqli_query($con2,$sql2))
					{	
		                   
						
							
					
					}
						else
					{
						echo "<script>alert('Error' );</script>";
					}
				
					$hora=$hora+1;
				}
		

		echo "<script>alert('Modificacion Exitosa' );</script>";
				
				
				
					
		}
				

		
	
	
	else{
				echo "<script>alert('Error');</script>";

	}
	
}

function eliminarCancha($codigoEnviar){
	$con=conectarse();
	
	$sql="delete from estado where codigoCancha='"."$codigoEnviar"."'";
	if(mysqli_query($con,$sql))
	{
		
		$con2=conectarse();
	
		$sql2="delete from cancha where codigoCancha='"."$codigoEnviar"."'";
		if(mysqli_query($con2,$sql2))
		{
		
			echo "<script>alert('Registro eliminado');</script>";
		
		}
		else{
			echo "<script>alert('Error');</script>";
		}		
	}
	else{
		echo "<script>alert('Error');</script>";
	}
	
}



?>