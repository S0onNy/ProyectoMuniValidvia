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

		echo "  <div class='row featurette' align='center'>";
		echo "  <div class='col-md-7'>";
        echo "  <h2 class='featurette-heading'>".$fila["nombre"]."</h2>";
		echo "  <p class='lead'><b>Dirección: </b>".$fila["direccion"]."<br>";
		echo "  Horario:<br>";
		$con2=conectarse();
		$sql2="select estado.hora ,estado.lunes ,estado.martes ,estado.miercoles ,estado.jueves ,estado.viernes ,estado.sabado ,estado.domingo from estado inner join cancha ON estado.codigoCancha=cancha.codigoCancha where cancha.codigoCancha='"."$cCancha"."'";
		$rs2=mysqli_query($con2,$sql2);
		echo"<table border=1>";
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
		}
       echo" </table>";
		echo" <br>";
	     echo" <br>";
		
		echo "  <a href='recinto1.php'>Arrendar</a>";
		echo "  </div>";

        
		echo "	<div class='col-md-5'>";
		echo "  <img class='featurette-image img-responsive center-block' data-src='holder.js/500x500/auto' alt='500x500' 		src=''>";
		echo " 	</div>";
		echo " 	</div>";

		
		
                  	
    	
		
	}
	
      
	}else{
		echo "Error inesperado";
	}
}

function insertarCancha($nombre,$direccion,$superficie){
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
			$sql3="insert into cancha values ('"."$val"."','"."$nombre"."','"."$direccion"."','"."$superficie"."')";
			
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

?>