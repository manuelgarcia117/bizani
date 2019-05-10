<?php	

session_start();
require_once("../controller/functions.php");
require_once("../controller/db.php");
require_once("../controller/vars.php");
$conexion = new Conexion();


	$put = false;
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		$data = json_decode(file_get_contents("php://input"), true);
		$put = true;
	}
	else {
		$put = false;
		$json = $_POST['json'];
		$json = utf8_encode($json);
		$json = str_replace('\"', '"', $json);
		$data = json_decode($json, true);
	}
	
	if(!isset($data['tipopublicacion'])){ $tipopublicacion=0; } else { $tipopublicacion=$data['tipopublicacion']; }
	if(!isset($data['tipoinmueble'])){ $tipoinmueble=0; } else { $tipoinmueble=$data['tipoinmueble']; }
	if(!isset($data['title'])){ $title=0; } else { $title=$data['title']; }
	if(!isset($data['content'])){ $content=0; } else { $content=$data['content']; }
	$author=$data['author'];
	if(!isset($data['carac_interior'])){ $carac_interior=0; } else { $carac_interior=$data['carac_interior']; }
	if(!isset($data['carac_exterior'])){ $carac_exterior=0; } else { $carac_exterior=$data['carac_exterior']; }
	if(!isset($data['carac_seguridad'])){ $carac_seguridad=0; } else { $carac_seguridad=$data['carac_seguridad']; }
	if(!isset($data['carac_extra'])){ $carac_extra=0; } else { $carac_extra=$data['carac_extra']; }
	if(!isset($data['carac_inquilino'])){ $carac_inquilino=0; } else { $carac_inquilino=$data['carac_inquilino']; }
	if(!isset($data['carac_reglas'])){ $carac_reglas=0; } else { $carac_reglas=$data['carac_reglas']; }
	if(!isset($data['carac_'])){ $carac_=0; } else { $carac_=$data['carac_']; }
	if(!isset($data['youtube'])){ $youtube=0; } else { $youtube=$data['youtube']; }
	if(!isset($data['dep'])){ $dep=0; } else { $dep=$data['dep']; }
	if(!isset($data['mun'])){ $mun=0; } else { $mun=$data['mun']; }
	if(!isset($data['direccion'])){ $direccion=0; } else { $direccion=$data['direccion']; }
	if(!isset($data['lat'])){ $lat=0; $lat2 = intval($lat * 100000000); } else { $lat=$data['lat']; $lat2 = intval($lat * 100000000); }
	if(!isset($data['lng'])){ $lng=0; $lng2 = intval($lng * 100000000); } else { $lng=$data['lng']; $lng2 = intval($lng * 100000000); }
	if(!isset($data['address'])){ $address=0; } else { $address=$data['address']; }
	if(!isset($data['nombremun'])){ $nombremun=0; } else { $nombremun=$data['nombremun']; }
	if(!isset($data['names'])){ $names=0; } else { $names=$data['names']; }
	if(!isset($data['lastnames'])){ $lastnames=0; } else { $lastnames=$data['lastnames']; }
	if(!isset($data['email'])){ $email=0; } else { $email=$data['email']; }
	if(!isset($data['cel'])){ $cel=0; } else { $cel=$data['cel']; }
	if(!isset($data['type'])){ $type=0; } else { $type=$data['type']; }
	if(!isset($data['precio'])){ $precio=0; } else { $precio=$data['precio']; }
	if(!isset($data['admin'])){ $admin=0; } else { $admin=$data['admin']; }
	if(!isset($data['area'])){ $area=0; } else { $area=$data['area']; }
	if(!isset($data['hab'])){ $hab=0; } else { $hab=$data['hab']; }
	if(!isset($data['park'])){ $park=0; } else { $park=$data['park']; }
	if(!isset($data['banos'])){ $banos=0; } else { $banos=$data['banos']; }
	if(!isset($data['estrato'])){ $estrato=0; } else { $estrato=$data['estrato']; }
                  

$link = $youtube;
$inmpublish = $tipopublicacion;
$tipoinm = $tipoinmueble;
$des = $content;
$area_ = $area;
$park_ = $park;
$cuarto = $hab;
$searchpublicar = $nombremun;

$nombre = $names;
$apellido = $lastnames;
$celular = $cel;
$tel = "0";
$soy = $type;
$id = $author;

$interior = json_encode($carac_interior);
$exterior = json_encode($carac_exterior);
$extras = json_encode($carac_extra);
$inquilino = json_encode($carac_inquilino);
$seguridad = json_encode($carac_seguridad);
$reglas = json_encode($carac_reglas);
$carac = json_encode($carac_);


$date = date("Y-m-d H:i:s");
$cero = "0";
$status_pro = "pending";
$use = $conexion->prepare("INSERT INTO `inmueble`(`author`,`date`,`content`,`title`,`name`,`modified`,`status`,`tipopublicacion`,`tipoinmueble`,`carac_interior`,`carac_exterior`,`carac_extras`,`carac_inquilino`,`carac_seguridad`,`carac_reglas`,`carac_`,`precio`,`park`,`habitaciones`,`banos`,`ubicacionaddress`,`ubicacionlat`,`ubicacionlon`,`departamento`,`barrio`,`direccion`,`latitud`,`longitud`,`nombres`,`apellidos`,`email`,`telefono`,`celular`,`administracion`,`area`,`ciudad`,`codigo_postal`,`fotouser`,`urlyoutube`,`estrato`) VALUES (:autor,:date,:des,:title,:name,:date2,:status,:inmpublish,:tipoinm,:carac_interior,:carac_exterior,:carac_extras,:carac_inquilino,:carac_seguridad,:carac_reglas,:carac_,:precio,:park_,:habitaciones,:banos,:searchpublicar,:lat,:lng,:dep,:barr,:direccion,:lat2,:lng2,:nombre,:apellido,:email,:tel,:celular,:admin,:area_,:ciudad,:codezip,:fotouser,:urlyoutube,:estrato)");
$use->bindParam(":autor",$id);
$use->bindParam(":date",$date);
$use->bindParam(":des",$des);
$use->bindParam(":title",$title);
$use->bindParam(":name",$cero);
$use->bindParam(":date2",$date);
$use->bindParam(":status",$status_pro);
$use->bindParam(":inmpublish",$inmpublish);
$use->bindParam(":tipoinm",$tipoinm);
$use->bindParam(":carac_interior",$interior);
$use->bindParam(":carac_exterior",$exterior);
$use->bindParam(":carac_extras",$extras);
$use->bindParam(":carac_inquilino",$inquilino);
$use->bindParam(":carac_seguridad",$seguridad);
$use->bindParam(":carac_reglas",$reglas);
$use->bindParam(":carac_",$carac);
$use->bindParam(":precio",$precio);
$use->bindParam(":park_",$park_);
$use->bindParam(":habitaciones",$cuarto);
$use->bindParam(":banos",$banos);
$use->bindParam(":searchpublicar",$searchpublicar);
$use->bindParam(":lat",$lat);
$use->bindParam(":lng",$lng);
$use->bindParam(":dep",$cero);
$use->bindParam(":barr",$cero);
$use->bindParam(":direccion",$cero);
$use->bindParam(":lat2",$lat2);
$use->bindParam(":lng2",$lng2);
$use->bindParam(":nombre",$nombre);
$use->bindParam(":apellido",$apellido);
$use->bindParam(":email",$email);
$use->bindParam(":tel",$tel);
$use->bindParam(":celular",$celular);
$use->bindParam(":admin",$admin);
$use->bindParam(":area_",$area_);
$use->bindParam(":ciudad",$cero);
$use->bindParam(":codezip",$cero);
$use->bindParam(":fotouser",$cero);
$use->bindParam(":urlyoutube",$link);
$use->bindParam(":estrato",$estrato);
$status=$use->execute();
$lastId = $conexion->lastInsertId();

if($status){
$sta = $lastId;
} else {
$sta = "0";
}

$data = array("null"=>"","status"=>$sta);
print_r(json_encode($data));
?>
