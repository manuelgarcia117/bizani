<?php
session_start();
include("../controller/db.php");
$id = utf8_encode($_GET["id"]);
$nombre=urldecode($_GET["nombre"]);
$apellido=urldecode($_GET["apellido"]);
$correo=urldecode($_GET["correo"]);
$clave=urldecode($_GET["clave"]);
$tel=$_GET["tel"];
$cel=$_GET["cel"];

$consulta = "UPDATE user_secure SET name = '$nombre', lastname = '$apellido', email = '$correo', clv = '$clave', cel = '$cel', tel = '$tel'
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