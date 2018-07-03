<?php
require("phpConexionConsulta.php");
$con=conectarse();
$codigoCancha = $_POST['codigoCancha'];
$query2 = "select * from estado where codigoCancha = '"."$codigoCancha"."'";
$rs2 =$mysli -> query($query2);
$html= "<option value='0'>Seleccionar</option>";
while($row = $rs2 -> fetch_assoc() ){
	$html= "<option value='".$row['codigoCancha']."'>".$fila[1]."</option>";

	}
echo $html;



?>