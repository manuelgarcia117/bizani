<?php
header('Access-Control-Allow-Origin: *');
session_start();
require_once("db.php");
$conexion = new Conexion();
	
if(isset($_GET["id"])){
$id=$_GET["id"];
} else if(isset($_POST["id"])) {
$id=$_POST["id"];
}

	$use = $conexion->prepare("SELECT * FROM `inmueble` WHERE id=:id");
	$use->bindParam(":id",$id);
	$use->execute();
	$user = $use->fetchAll();

	foreach($user as $item){
	$ids["id"][] = $item['id'];
	$content["content"][] = $item['content'];
	$title["title"][] = $item['title'];
	
	$tipopublicacion["tipopublicacion"][] = $item['tipopublicacion'];
	$tipoinmueble["tipoinmueble"][] = $item['tipoinmueble'];
	$precio["precio"][] = $item['precio'];
	$habitaciones["habitaciones"][] = $item['habitaciones'];
	$banos["banos"][] = $item['banos'];
	$park["park"][] = $item['park'];
	$ubicacionaddress["ubicacionaddress"][] = $item['ubicacionaddress'];
	$ubicacionlat["ubicacionlat"][] = $item['ubicacionlat'];
	$ubicacionlon["ubicacionlon"][] = $item['ubicacionlon'];
	$direccion["direccion"][] = $item['direccion'];
	$administracion["administracion"][] = $item['administracion'];
	$area["area"][] = $item['area'];
	$estrato["estrato"][] = $item['estrato'];
	$youtube["youtube"][] = $item['urlyoutube'];
	$nombres["nombres"][] = $item['nombres'];
	$apellidos["apellidos"][] = $item['apellidos'];
	$email["email"][] = $item['email'];
	$telefono["telefono"][] = $item['telefono'];
	$celular["celular"][] = $item['celular'];
	
	$latitud["latitud"][] = $item['latitud'];
	$longitud["longitud"][] = $item['longitud'];
	
	$carac=str_replace('"',"",$item['carac_interior'].",".$item['carac_exterior'].",".$item['carac_extras'].",".$item['carac_inquilino'].",".$item['carac_seguridad'].",".$item['carac_reglas']);
	
	$carac=str_replace('[',"",$carac);
	$carac=str_replace(']',"",$carac);
	$caracteristicas["caracteristicas"][] = $carac;
	}
	
	$cantidad_imagenes["cantidad_imagenes"] = count(glob('../images/inm/'.$id.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
	
	$data = $ids+$content+$title+$tipopublicacion+$tipoinmueble+$precio+$habitaciones+$banos+$park+$ubicacionaddress+$ubicacionlat+$ubicacionlon+$direccion+$administracion+$area+$estrato+$youtube+$nombres+$apellidos+$email+$telefono+$celular+$cantidad_imagenes+$caracteristicas+$latitud+$longitud;
	print_r(json_encode($data));

?>