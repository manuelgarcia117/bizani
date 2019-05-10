<?php
session_start();
include("../controller/db.php");
$destinatario = urldecode(($_GET["destinatario"]));
$asunto = urldecode(utf8_encode($_GET["id"]));
$mensaje = urldecode(utf8_encode($_GET["id"]));
$na=rand(1,30);
// $consulta = "UPDATE inmueble set status='$estado' WHERE id=$id";
// $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if($na % 2 ==0){
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