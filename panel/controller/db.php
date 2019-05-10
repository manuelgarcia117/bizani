<?php
function conectarse(){
	$servidor="localhost";
	$usuario="root";
	$password = "";
	$bd="bizani_platform";
	$conectar = new mysqli($servidor,$usuario,$password,$bd) or die ("no se pudo conectar al servidor de bases de datos mysql");
	return $conectar;
}
$conexion = conectarse();
?>	
