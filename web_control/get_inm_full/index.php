<?php
header('Access-Control-Allow-Origin: *');
session_start();
require_once("../db.php");
$conexion = new Conexion();
if(isset($_GET["id"])){
$id=$_GET["id"];
} else if(isset($_POST["id"])) {
$id=$_POST["id"];
}

if(isset($_GET["id_user"])){
$id_user=$_GET["id_user"];
} else if(isset($_POST["id_user"])) {
$id_user=$_POST["id_user"];
}

$use = $conexion->prepare("SELECT * FROM `inmueble` WHERE id=:id");
$use->bindParam(":id",$id);
$use->execute();
$user = $use->fetchAll();
foreach($user as $item){

$ids["id"] = $item['id'];
$tipopublicacion["tipopublicacion"] = $item['tipopublicacion'];
$tipoinmueble["tipoinmueble"] = $item['tipoinmueble'];
$status["status"] = $item['status'];
$authors["author"] = $item['author'];
$content["content"] = $item['content'];
$title["title"] = $item['title'];
$precio["precio"] = $item['precio'];
$habitaciones["habitaciones"] = $item['habitaciones'];
$banos["banos"] = $item['banos'];
$park["park"] = $item['park'];
$ubicacionlat["ubicacionlat"] = $item['ubicacionlat'];
$ubicacionlon["ubicacionlon"] = $item['ubicacionlon'];
$direccion["direccion"] = $item['direccion'];
$administracion["administracion"] = $item['administracion'];
$area["area"] = $item['area'];
$date["date"] = $item['date'];
$barrio["barrio"] = $item['barrio'];
$estrato["estrato"] = $item['estrato'];

$departamento["departamento"] = $item['departamento'];
$ciudad["ciudad"] = $item['ciudad'];


$carac_interior["carac_interior"] = json_decode($item['carac_interior'], true);
$carac_extras["carac_extras"] = json_decode($item['carac_extras'], true);
$carac_exterior["carac_exterior"] = json_decode($item['carac_exterior'], true);
$carac_seguridad["carac_seguridad"] = json_decode($item['carac_seguridad'], true);
$carac_inquilino["carac_inquilino"] = json_decode($item['carac_inquilino'], true);
$carac_reglas["carac_reglas"] = json_decode($item['carac_reglas'], true);
$carac_["carac_"] = json_decode($item['carac_'], true);

$urlyoutube["urlyoutube"] = $item['urlyoutube'];
$names["name"] = $item['nombres'];
$twonames["lastname"] = $item['apellidos'];
$celular["cel"] = $item['celular'];
$fotouser["fotouser"] = $item['fotouser'];

$dir_img  = scandir('../../images/inm/'.$id.'/');
$img_count = count($dir_img);
$numimg["numimg"] = $img_count;

$uses = $conexion->prepare("SELECT * FROM bizani_platform.`favorite` WHERE id_user=:id AND id_post=:post");
$uses->bindParam(":id",$id_user);
$uses->bindParam(":post",$id);
$uses->execute();
$fav_ = $uses->rowCount();
if($fav_>0){$fav=1;} else {$fav=0;}
$favorite["isfavorite"]=$fav;
}


	$data["inm"] = $ids+$status+$tipopublicacion+$tipoinmueble+$authors+$content+$title+$precio+$habitaciones+$banos+$park+$ubicacionlat+$ubicacionlon+$direccion+$administracion+$area+$date+$barrio+$estrato+$departamento+$ciudad+$carac_interior+$carac_exterior+$carac_extras+$carac_seguridad+$carac_inquilino+$carac_reglas+$carac_+$urlyoutube+$names+$twonames+$celular+$fotouser+$numimg+$favorite;
	print_r(json_encode($data));
?>