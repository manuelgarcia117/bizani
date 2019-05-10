<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
header('Access-Control-Allow-Origin: *');

require_once("db.php");
require_once("../enviarCorreo.php");

$conexion = new Conexion();
if(isset($_POST['email'])){
$email = $_POST['email'];
$pass = $_POST['clv'];
$name = $_POST['name'];

$users = $conexion->prepare("SELECT * FROM `user_secure` WHERE  email = ? AND clv = ?");
$users->bindParam(1,$email);
$users->bindParam(2,$pass);
$users->execute();
$rows = $users->fetch(PDO::FETCH_NUM);
if($rows==0){
	$row=1;
} else {
	$row=0;
}
if($rows == 0) {
$date = date("Y-m-d H:i:s");
do {
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
$rand = array_rand($seed, 4);
$convert = array_map(function($n){
    global $seed;
    return $seed[$n];
},$rand);
$var = implode('',$convert);

$consulta3 = $conexion->prepare('SELECT * FROM `user_secure` WHERE code=:code');
$consulta3->bindValue(":code",$var);
$consulta3->execute();
$rows2 = $consulta3->fetch(PDO::FETCH_NUM);
if($rows2==0){
break;
}
} while (0);

					$use = $conexion->prepare("INSERT INTO `user_secure`(`email`, `clv`, `name`, `lastname`, `cel`, `tel`, `code`, `alert`, `chat`, `active`, `registered`) VALUES (?,?,?,'0','0','0',?,'0','0','1',?)");
					$use->bindParam(1,$email);
					$use->bindParam(2,$pass);
					$use->bindParam(3,$name);
					$use->bindParam(4,$var);
					$use->bindParam(5,$date);
					$use->execute();
	
					send_email("registro",$email,$name);
					
} else {

}
} else {
	$row = 0;
}
if($row==0){
$data = array("null"=>"0","status"=>$row);
}else{
$data = array("null"=>"0","status"=>$row);
}
print_r(json_encode($data));
?>