<?php
session_start();
include("../controller/db.php");
$estado = utf8_encode($_GET["estado"]);
$id = utf8_encode($_GET["id"]);
$consulta = "UPDATE inmueble set status='$estado' WHERE id=$id";
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