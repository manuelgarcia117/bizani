<?php
session_start();
require_once("../web_control/functions.php");
require_once("../web_control/db.php");
//require_once("../enviarCorreo.php");
$conexion = new Conexion();

date_default_timezone_set("America/Bogota");

$link = $_POST['link'];
$inmpublish = $_POST['inmpublish'];
$tipoinm = $_POST['tipoinm'];
$title = $_POST['titulo'];
$des = $_POST['des'];
$precio = $_POST['precio'];
$admin = $_POST['admin'];
$estrato = $_POST['estrato'];
$area = $_POST['area'];
$park = $_POST['park'];
$cuarto = $_POST['cuarto'];
$banos = $_POST['banos'];
$searchpublicar = $_POST['searchpublicar'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$lat2 = intval($lat * 100000000);
$lng2 = intval($lng * 100000000);
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$tel = $_POST['tel'];
//$id = $_POST['id'];
if(isset($_SESSION['id_bizani'])){$id=$_SESSION['id_bizani']; }else{$id= "0"; } 

$interior = json_encode($_POST['interior']);
$exterior = json_encode($_POST['exterior']);
$extras = json_encode($_POST['extras']);
$inquilino = json_encode($_POST['inquilino']);
$seguridad = json_encode($_POST['seguridad']);
$reglas = json_encode($_POST['reglas']);

if($interior=='""'){$interior='';}
if($exterior=='""'){$exterior='';}
if($extras=='""'){$extras='';}
if($inquilino=='""'){$inquilino='';}
if($seguridad=='""'){$seguridad='';}
if($reglas=='""'){$reglas='';}

/*$interior = ($_POST['interior']);
$exterior = ($_POST['exterior']);
$extras = ($_POST['extras']);
$inquilino = ($_POST['inquilino']);
$seguridad = ($_POST['seguridad']);
$reglas = ($_POST['reglas']);*/

//echo "caracteristicas : ".$interior.";" ;

$json="";
$array=(explode(",",$interior));
for ($i=0; $i <= count($array)-1; $i++) {
	if($i==0){
		$json.="[";
		$json.=$array[$i].'"';
	}else{
		if($i==(count($array)-1)){
			$json.=',"'.$array[$i];
			$json.="]";
		}else{
			$json.=',"'.$array[$i].'"';
		}
	}
	if(count($array)-1==0){
		//$json.="]";
		$json='['.$array[$i].']';
	}
}
$interior=$json;
$json="";
$array=(explode(",",$exterior));
for ($i=0; $i <= count($array)-1; $i++) {
	if($i==0){
		$json.="[";
		$json.=$array[$i].'"';
	}else{
		if($i==(count($array)-1)){
			$json.=',"'.$array[$i];
			$json.="]";
		}else{
			$json.=',"'.$array[$i].'"';
		}
	}
	if(count($array)-1==0){
		//$json.="]";
		$json='['.$array[$i].']';
	}
}
$exterior=$json;
$json="";
$array=(explode(",",$extras));
for ($i=0; $i <= count($array)-1; $i++) {
	if($i==0){
		$json.="[";
		$json.=$array[$i].'"';
	}else{
		if($i==(count($array)-1)){
			$json.=',"'.$array[$i];
			$json.="]";
		}else{
			$json.=',"'.$array[$i].'"';
		}
	}
	if(count($array)-1==0){
		//$json.="]";
		$json='['.$array[$i].']';
	}
}
$extras=$json;
$json="";
$array=(explode(",",$inquilino));
for ($i=0; $i <= count($array)-1; $i++) {
	if($i==0){
		$json.="[";
		$json.=$array[$i].'"';
	}else{
		if($i==(count($array)-1)){
			$json.=',"'.$array[$i];
			$json.="]";
		}else{
			$json.=',"'.$array[$i].'"';
		}
	}
	if(count($array)-1==0){
		//$json.="]";
		$json='['.$array[$i].']';
	}
}
$inquilino=$json;
$json="";
$array=(explode(",",$seguridad));
for ($i=0; $i <= count($array)-1; $i++) {
	if($i==0){
		$json.="[";
		$json.=$array[$i].'"';
	}else{
		if($i==(count($array)-1)){
			$json.=',"'.$array[$i];
			$json.="]";
		}else{
			$json.=',"'.$array[$i].'"';
		}
	}
	if(count($array)-1==0){
		//$json.="]";
		$json='['.$array[$i].']';
	}
}
$seguridad=$json;
$json="";
$array=(explode(",",$reglas));
for ($i=0; $i <= count($array)-1; $i++) {
	if($i==0){
		$json.="[";
		$json.=$array[$i].'"';
	}else{
		if($i==(count($array)-1)){
			$json.=',"'.$array[$i];
			$json.="]";
		}else{
			$json.=',"'.$array[$i].'"';
		}
	}
	if(count($array)-1==0){
		//$json.="]";
		$json='['.$array[$i].']';
	}
}
$reglas=$json;
$json="";


$date = date("Y-m-d H:i:s");
$cero = "0";
$status_pro = "pending";
$use = $conexion->prepare("INSERT INTO `inmueble`(`author`,`date`,`content`,`title`,`name`,`modified`,`status`,`tipopublicacion`,`tipoinmueble`,`carac_interior`,`carac_exterior`,`carac_extras`,`carac_inquilino`,`carac_seguridad`,`carac_reglas`,`precio`,`park`,`habitaciones`,`banos`,`ubicacionaddress`,`ubicacionlat`,`ubicacionlon`,`departamento`,`barrio`,`direccion`,`latitud`,`longitud`,`nombres`,`apellidos`,`email`,`telefono`,`celular`,`administracion`,`area`,`ciudad`,`codigo_postal`,`fotouser`,`urlyoutube`,`estrato`) 
VALUES (:autor,:date,:des,:title,:name,:date2,:status,:inmpublish,:tipoinm,:carac_interior,:carac_exterior,:carac_extras,:carac_inquilino,:carac_seguridad,:carac_reglas,:precio,:park,:habitaciones,:banos,:searchpublicar,:lat,:lng,:dep,:barr,:direccion,:lat2,:lng2,:nombre,:apellido,:email,:tel,:celular,:admin,:area,:ciudad,:codezip,:fotouser,:urlyoutube,:estrato)");
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
$use->bindParam(":precio",$precio);
$use->bindParam(":park",$park);
$use->bindParam(":habitaciones",$cuarto);
$use->bindParam(":banos",$banos);
$use->bindParam(":searchpublicar",$searchpublicar);
$use->bindParam(":lat",$lat);
$use->bindParam(":lng",$lng);
$use->bindParam(":dep",$cero);
$use->bindParam(":barr",$cero);
$use->bindParam(":direccion",$searchpublicar);
$use->bindParam(":lat2",$lat2);
$use->bindParam(":lng2",$lng2);
$use->bindParam(":nombre",$nombre);
$use->bindParam(":apellido",$apellido);
$use->bindParam(":email",$email);
$use->bindParam(":tel",$tel);
$use->bindParam(":celular",$celular);
$use->bindParam(":admin",$admin);
$use->bindParam(":area",$area);
$use->bindParam(":ciudad",$cero);
$use->bindParam(":codezip",$cero);
$use->bindParam(":fotouser",$cero);
$use->bindParam(":urlyoutube",$link);
$use->bindParam(":estrato",$estrato);
$status=$use->execute();
$lastId = $conexion->lastInsertId();

if($status){
$sta = $lastId;
//$sta = "1";
//send_email("anuncio",$email,$nombre." ".$apellido);
} else {
$sta = "0";
}

//$data = array("null"=>"","status"=>$sta);
//print_r(json_encode($data));
echo $sta;

?>