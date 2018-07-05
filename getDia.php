<?php
require("conexion.php");

$html= "<option value='0'>Seleccionar</option>";



	$html .= "<option value='lunes'>lunes</option>";
	$html .= "<option value='martes'>martes</option>";
	$html .= "<option value='miercoles'>miercoles</option>";
	$html .= "<option value='jueves'>jueves</option>";
	$html .= "<option value='viernes'>viernes</option>";
	$html .= "<option value='sabado'>sabado</option>";
	$html .= "<option value='domingo'>domingo</option>";
	
    
echo $html;




?>