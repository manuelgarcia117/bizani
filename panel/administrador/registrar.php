<?php
session_start();
include("../controller/db.php");
$name = utf8_encode($_GET["name"]);
$email = utf8_encode($_GET["email"]);
$clave = sha1(utf8_encode($_GET["clave"]));
$consulta = "INSERT INTO panel_user (name,email,password,roles) VALUES('$name','$email','$clave',0)";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if($ejecutar_consulta==1){
    $status["status"][] = "1";
	$data = $status;
}
else{
    $status["status"][] = "0";
	$data = $status;
}
print_r(json_encode($data));
$conexion->close();
?>