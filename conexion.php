<?php 

$mysqli =new mysqli("localhost","root","","muni");
if ($mysqli -> connect_error){
	die('error' .$mysqli->connect_error);
}
?> 