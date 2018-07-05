<?php
require("conexion.php");

$codigoCancha = $_POST['codigoCancha'];

$query2 = "select codigoCancha,hora from estado where codigoCancha = '$codigoCancha'";

$resultado2 = $mysqli ->query($query2);



$html= "<option value='0'>Seleccionar</option>";

while($row = $resultado2->fetch_assoc()){ 

$html .= "<option value='".$row['hora']."'>".$row['hora']."</option>";
        
  }
echo $html;




?>