<?php
header('Access-Control-Allow-Origin: *');
require_once("../web_control/db.php");
$conexion = new Conexion();

if(isset($_GET["id"])){
$id = $_GET["id"];

$uno = $conexion->prepare('SELECT * FROM `inmueble` WHERE id=:id');
$uno->bindParam(":id",$id);
$uno->execute();
while ($us = $uno->fetch(PDO::FETCH_ASSOC)) {
	$use = $conexion->prepare("SELECT * FROM `inmueble` WHERE id=:id_post");
					
	$use->bindParam(":id_post",$us["id"]);
	$use->execute();
	$user = $use->fetchAll();
	$rows = $use->rowCount();
	
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
		$status["status"][] = $item['status'];
		
	}
	
	$use = $conexion->prepare("SELECT 
					count(v.id_post) as cantidadvisitas,
					i.id,
					i.author,
					i.tipopublicacion,
					i.tipoinmueble,
					i.content,
					i.title,
					i.precio,
					i.habitaciones,
					i.banos,
					i.park,
					i.ubicacionlat,
					i.ubicacionlon,
					i.direccion,
					i.administracion,
					i.status,
					i.area
					FROM 
					inmueble i,
					visita v
					WHERE i.id=v.id_post
					AND i.id=:id_post
					GROUP BY (v.id_post)");
					
	$use->bindParam(":id_post",$us["id"]);
	$use->execute();
	$user = $use->fetchAll();
	$rows = $use->rowCount();
	if($rows<1){$cantidadvisitas["cantidadvisitas"][] =0;}
	
	foreach($user as $item){
		$cantidadvisitas["cantidadvisitas"][] = $item['cantidadvisitas'];
	}
	
	$use = $conexion->prepare("SELECT 
					count(f.id_post) as cantidadlikes,
					i.id,
					i.author,
					i.tipopublicacion,
					i.tipoinmueble,
					i.content,
					i.title,
					i.precio,
					i.habitaciones,
					i.banos,
					i.park,
					i.ubicacionlat,
					i.ubicacionlon,
					i.direccion,
					i.administracion,
					i.status,
					i.area
					FROM 
					inmueble i,
					favorite f
					WHERE i.id=f.id_post
					AND i.id=:id_post
					GROUP BY (f.id_post)");
					
	$use->bindParam(":id_post",$us["id"]);
	$use->execute();
	$user = $use->fetchAll();
	$rows = $use->rowCount();
	if($rows<1){$cantidadlikes["cantidadlikes"][] =0;}
	
	foreach($user as $item){
		$cantidadlikes["cantidadlikes"][] = $item['cantidadlikes'];
	}
	
	
}
if (isset($ids)) {
	$data = $ids+$authors+$tipopublicacions+$tipoinmuebles+$content+$title+$precio+$habitaciones+$banos+$park+$ubicacionlat+$ubicacionlon+$direccion+$administracion+$area+$cantidadvisitas+$cantidadlikes+$status;
} else {
	$ids["id"] = "0";
	$data = $ids;
}
	print_r(json_encode($data));
}
?>