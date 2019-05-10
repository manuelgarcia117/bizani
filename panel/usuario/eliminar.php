<?php
session_start();
include("../controller/db.php");
$id = utf8_encode($_GET["id"]);

$consulta = "DELETE FROM user_secure
            WHERE id=$id";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if($ejecutar_consulta==1){
    $status["status"][] = "1";
	$data = $status;
	print_r(json_encode($data));
	
}
else{
    $status["status"][] = 0;
	$data = $status;
	print_r(json_encode($data));
}
$conexion->close();
?>