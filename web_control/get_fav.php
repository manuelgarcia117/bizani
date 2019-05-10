<?php
header('Access-Control-Allow-Origin: *');
require_once("db.php");
$conexion = new Conexion();

if(isset($_POST["id"])){
$id = $_POST["id"];

$uno = $conexion->prepare('SELECT * FROM `favorite` WHERE id_user=:id');
$uno->bindParam(":id",$id);
$uno->execute();
while ($us = $uno->fetch(PDO::FETCH_ASSOC)) {
	$use = $conexion->prepare("SELECT * FROM `inmueble` WHERE id=:id");
	$use->bindParam(":id",$us["id_post"]);
	$use->execute();
	$user = $use->fetchAll();
	
	foreach($user as $item){
		//echo  $item['id']."<br>";
		
		$ids["id"][] = $item['id'];
		$tipopublicacions["tipopublicacion"][] = $item['tipopublicacion'];
		$tipoinmuebles["tipoinmueble"][] = $item['tipoinmueble'];
		$authors["author"][] = $item['author'];
		$content["content"][] = utf8_encode($item['content']);
		$title["title"][] = utf8_encode($item['title']);
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
}
if (isset($ids)) {
	$data = $ids+$authors+$tipopublicacions+$tipoinmuebles+$content+$title+$precio+$habitaciones+$banos+$park+$ubicacionlat+$ubicacionlon+$direccion+$administracion+$area;
} else {
	$ids["id"] = "0";
	$data = $ids;
}
	print_r(json_encode($data));
}
?>