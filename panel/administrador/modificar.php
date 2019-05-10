<?php
session_start();
include("../controller/db.php");
$id = utf8_encode($_GET["id"]);
$name=$_GET["name"];
$email=trim($_GET["email"]);
$claver = utf8_encode($_GET["clave"]);
$clave = sha1(utf8_encode($_GET["clave"]));

$consulta = "UPDATE panel_user set name='$name',email='$email'";
if($claver!=""){
    $consulta.= ",clave='$clave' WHERE id=$id";
}
else{
    $consulta.= " WHERE id=$id";
} 
echo $consulta;
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