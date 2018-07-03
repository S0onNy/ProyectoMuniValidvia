<?php
require("phpConexionConsulta.php");
$con=conectarse();
$codigoCancha = $_POST['codigoCancha'];
$sql = "select * from estado  where codigoCancha = '$codigoCancha'";
$rs2=mysqli_query($con,$sql);
$html= "<option value='0'>Seleccionar</option>";
while($fila =mysqli_fetch_row($rs2) )
{
	$html= "<option value='".$fila['codigoCancha']."'>".$fila['hora']."</option>";

}

echo $html;


?>