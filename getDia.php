<?php
require("conexion.php");

$html= "<option value='0'>Seleccionar</option>";



	$html .= "<option value='0'>lunes</option>";
	$html .= "<option value='1'>martes</option>";
	$html .= "<option value='2'>miercoles</option>";
	$html .= "<option value='3'>jueves</option>";
	$html .= "<option value='4'>viernes</option>";
	$html .= "<option value='5'>sabado</option>";
	$html .= "<option value='6'>domingo</option>";
	
    
echo $html;




?>