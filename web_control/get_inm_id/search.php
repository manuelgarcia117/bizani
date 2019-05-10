<?php
header('Access-Control-Allow-Origin: *');
session_start();
require_once("../db.php");
$conexion = new Conexion();
	
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		$data = json_decode(file_get_contents("php://input"), true);
	}
	else {
		$json = $_POST['json'];
		$json = str_replace('\"', '"', $json);
		$data = json_decode($json, true);
	}
	
	$what_to_publish = $data['what_to_publish'];
	$property_type = $data['property_type'];
	$id_user = $data['id_user'];
	
	$min_lat = intval( ($data['lat'] - $data['lat_i']) * 100000000 );
	$max_lat = intval( ($data['lat'] + $data['lat_i']) * 100000000 );
	
	$min_lng = intval( ($data['lng'] - $data['lng_i']) * 100000000 );
	$max_lng = intval( ($data['lng'] + $data['lng_i']) * 100000000 );
	if(isset($data['hab'])){
		if($data['hab']==0) {
			$hab_ = 0;
		} else {
			$hab_ = $data['hab'];
		}
	} else {
	$hab_ = 0;
	}
	if(isset($data['banos'])){
		if($data['banos']==0) {
			$banos_ = 0;
		} else {
			$banos_ = $data['banos'];
		}
	} else {
	$banos_ = 0;
	}
	if(isset($data['park'])){
		if($data['park']==0) {
			$park_ = 0;
		} else {
			$park_ = $data['park'];
		}
	} else {
	$park_ = 0;
	}
	if(isset($data['estrato'])){
		if($data['estrato']==0) {
			$estrato_ = 0;
		} else {
			$estrato_ = $data['estrato'];
		}
	} else {
	$estrato_ = 0;
	}
	if(isset($data['admin'])){
		if($data['admin']==0) {
			$admin_ = 0;
		} else {
			$admin_ = 100000000000;
		}
	} else {
	$admin_ = 0;
	}
	if(isset($data['amo'])){
	$amo_ = $data['amo'];
	} else {
	$amo_ = 0;
	}
	if(!isset($data['minval'])){
		$minval = 0;
	} else {
		$minval =  $data['minval'];
	}
	if(isset($data['maxval'])){
		if($data['maxval']==0){
		$maxval = 100000000000;
		} else {
		$maxval = $data['maxval'];
		}
	} else {
		$maxval = 100000000000;
	}
	if(!isset($data['minarea'])){
		$minarea = 0;
	} else {
		$minarea =  $data['minarea'];
	}
	if(isset($data['maxarea'])){
		if($data['maxarea']==0){
		$maxarea = 100000000000;
		} else {
		$maxarea = $data['maxarea'];
		}
	} else {
		$maxarea = 100000000000;
	}
	if(isset($data['search'])){
	$search_ = $data['search'];
	} else {
	$search_ = " ";
	}
$caracBuscado=[];
$caracInmueble=[];
$use = $conexion->prepare("SELECT GROUP_CONCAT(name) as name, text FROM carac WHERE text like '$search_%';");
//$use->bindParam(":palabra",$search_);
$use->execute();
$user = $use->fetchAll();
foreach($user as $item){
	$caracBuscado= explode(",",$item['name']);
	//echo "caracteristica buscada : ".$item['name']."<br>";
}
$use = $conexion->prepare("SELECT * FROM `inmueble` WHERE tipopublicacion = :tipopublicacion AND latitud BETWEEN :min_lat AND :max_lat AND longitud BETWEEN :min_lng AND :max_lng AND precio BETWEEN :minval AND :maxval AND habitaciones > :hab_ AND banos > :banos_ AND park > :park_ AND estrato > :estrato_ AND area BETWEEN :minarea AND :maxarea  ORDER BY precio asc LIMIT 0,200");
$use->bindParam(":tipopublicacion",$what_to_publish);
$use->bindParam(":min_lat",$min_lat);
$use->bindParam(":max_lat",$max_lat);
$use->bindParam(":min_lng",$min_lng);
$use->bindParam(":max_lng",$max_lng);
$use->bindParam(":minval",$minval);
$use->bindParam(":maxval",$maxval);
$use->bindParam(":hab_",$hab_);
$use->bindParam(":banos_",$banos_);
$use->bindParam(":park_",$park_);
$use->bindParam(":estrato_",$estrato_);
$use->bindParam(":minarea",$minarea);
$use->bindParam(":maxarea",$maxarea);
$use->execute();
$user = $use->fetchAll();
foreach($user as $item){
	
	$use2 = $conexion->prepare("SELECT
								id,
								CONCAT(
								REPLACE(REPLACE(carac_interior,'[',''),']',''),',',
								REPLACE(REPLACE(carac_exterior,'[',''),']',''),',',
								REPLACE(REPLACE(carac_inquilino,'[',''),']',''),',',
								REPLACE(REPLACE(carac_reglas,'[',''),']',''),',',
								REPLACE(REPLACE(carac_seguridad,'[',''),']',''),',',
								REPLACE(REPLACE(carac_extras,'[',''),']',''),',',
								REPLACE(REPLACE(carac_,'[',''),']','')
								) as a
								FROM inmueble
								WHERE id=:idInm;");
								
	$use2->bindParam(":idInm",$item['id']);//pregunto las caracteristicas del id del inmueble que pasa por el foreach
	$use2->execute();
	$user2 = $use2->fetchAll();
	foreach($user2 as $item2){
		$caracInmueble = explode(",", trim($item2['a']));
		//echo "caracteristica inmueble : ".$item2['a']."<br>";
	}
	
	$con=0;
	for($i=0;$i<count($caracBuscado);$i++){
		if(in_array('"'.$caracBuscado[$i].'"',$caracInmueble)){//pregunto, si $caracBuscado[$i] esta en $caracInmueble
			$con++;
			break;
		}
	}
	
	if($con>0){
		//echo "contador : ".$con."<br>";
		
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
		$date["date"][] = $item['date'];
		$estrato["estrato"][] = $item['estrato'];
		$uses = $conexion->prepare("SELECT * FROM bizani_platform.`favorite` WHERE id_user=:id AND id_post=:post");
		$uses->bindParam(":id",$id_user);
		$uses->bindParam(":post",$id);
		$uses->execute();
		$fav_ = $uses->rowCount();
		if($fav_>0){$fav=1;} else {$fav=0;}
		$favorite["isfavorite"][]=$fav;
	}
}
	
	
	if (!isset($ids)) {
	print_r("0");
	} else {
	$data = $ids+$tipopublicacions+$tipoinmuebles+$authors+$content+$title+$precio+$habitaciones+$banos+$park+$ubicacionlat+$ubicacionlon+$direccion+$administracion+$area+$date+$favorite+$estrato;
	print_r(json_encode($data));
	}
?>