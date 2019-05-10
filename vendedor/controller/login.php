<?php
session_start();
include("db.php");
$correo = strtoupper($_GET["email"]);
$password = sha1(strtoupper($_GET["clave"]));

$consulta = "SELECT
	         	*
			FROM
			panel_user u
			WHERE  upper(u.email) =upper('$correo')
			AND upper(u.password)=upper('$password')";

$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
$numReg=$ejecutar_consulta->num_rows;
$ro=$ejecutar_consulta->fetch_assoc();


if($numReg!=0){
	$ids["id"][] = $ro['id'];
	$email["email"][] = $ro['email'];
	$name["name"][] = $ro['name'];
	//$password["password"][] = $ro['password'];
	$status["status"][] = "1";

    $_SESSION["id_user"]=$ro['id'];
    $_SESSION["roles_user"]=$ro['roles'];
    $_SESSION["email_user"]=$ro['email'];
    $_SESSION["name_user"]=$ro['name'];
    $data = $ids+$email+$name+$status;
	
}else{
	$status["status"][] = "0";
	$data = $status;

}
$conexion->close();	
print_r(json_encode($data));
?>			