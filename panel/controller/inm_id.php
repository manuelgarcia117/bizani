<?php
header('Access-Control-Allow-Origin: *');
session_start();
require_once("db.php");
$conexion = new Conexion();
	
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		$data = json_decode(file_get_contents("php://input"), true);
	}
	else {
		$json = $_POST['json'];
		$json = str_replace('\"', '"', $json);
		$data = json_decode($json, true);
	}
	
	$id = $data['id'];

	$use = $conexion->prepare("SELECT * FROM `inmueble` WHERE id=:id");
	$use->bindParam(":id",$id);
	$use->execute();
	$user = $use->fetchAll();

	foreach($user as $item){
	$ids["id"][] = $item['id'];
	$content["content"][] = $item['content'];
	$title["title"][] = $item['title'];
	$precio["precio"][] = $item['precio'];
	$habitaciones["habitaciones"][] = $item['habitaciones'];
	$banos["banos"][] = $item['banos'];
	$park["park"][] = $item['park'];
	$ubicacionlat["ubicacionlat"][] = $item['ubicacionlat'];
	$ubicacionlon["ubicacionlon"][] = $item['ubicacionlon'];
	$direccion["direccion"][] = $item['direccion'];
	$administracion["administracion"][] = $item['administracion'];
	$area["area"][] = $item['area'];
	}

	$data = $ids+$content+$title+$precio+$habitaciones+$banos+$park+$ubicacionlat+$ubicacionlon+$direccion+$administracion+$area;
	print_r(json_encode($data));

?>