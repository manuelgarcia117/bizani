<?php
session_start();
include("../controller/db.php");
$id = utf8_encode($_GET["id"]);
$listaimagenes=$_GET["listaimagenes"];
$arrayimagenes = explode(",",$listaimagenes);
$fecha = utf8_encode($_GET["fecha"]);
$contenido = urldecode(utf8_encode($_GET["contenido"]));
$titulo = urldecode(utf8_encode($_GET["titulo"]));
$nombre = urldecode(utf8_encode($_GET["nombre"]));
$modificado = utf8_encode($_GET["modificado"]);
$tipopublicacion = utf8_encode($_GET["tipopublicacion"]);
$tipoinmueble = utf8_encode($_GET["tipoinmueble"]);
$caracinterior = utf8_encode($_GET["caracinterior"]);
$caracexterior = utf8_encode($_GET["caracexterior"]);
$caracextras = utf8_encode($_GET["caracextras"]);
$caracinquilino = utf8_encode($_GET["caracinquilino"]);
$reglas = utf8_encode($_GET["reglas"]);
$caracseguridad = utf8_encode($_GET["caracseguridad"]);
$carac = utf8_encode($_GET["carac"]);
$precio = utf8_encode($_GET["precio"]);
$parqueaderos = utf8_encode($_GET["parqueaderos"]);
$habitaciones = utf8_encode($_GET["habitaciones"]);
$banos = utf8_encode($_GET["banos"]);
$ubicacion = utf8_encode($_GET["ubicacion"]);
$latitud = utf8_encode($_GET["latitud"]);
$longitud = utf8_encode($_GET["longitud"]);
$departamento = urldecode(utf8_encode($_GET["departamento"]));
$barrio = urldecode(utf8_encode($_GET["barrio"]));
$direccion = urldecode(utf8_encode($_GET["direccion"]));
$latituda = utf8_encode($_GET["latituda"]);
$longituda = utf8_encode($_GET["longituda"]);
$nombres = urldecode(utf8_encode($_GET["nombres"]));
$apellidos = urldecode(utf8_encode($_GET["apellidos"]));
$email = urldecode(utf8_encode($_GET["email"]));  
$telefono = utf8_encode($_GET["telefono"]);  
$celular = utf8_encode($_GET["celular"]);  
$administracion = utf8_encode($_GET["administracion"]);  
$area = urldecode(utf8_encode($_GET["area"]));  
$ciudad  = urldecode(utf8_encode($_GET["ciudad"]));  
$codigopostal = utf8_encode($_GET["codigopostal"]);  
$fotousuario = utf8_encode($_GET["fotousuario"]);
$urlyoutube= urldecode(utf8_encode($_GET["urlyoutube"]));
$estrato = utf8_encode($_GET["estrato"]);
    

$consulta = "UPDATE inmueble set date='$fecha',content='$contenido',title='$titulo',name='$nombre',
            modified='$modificado', tipopublicacion='$tipopublicacion',tipoinmueble='$tipoinmueble', 
            carac_interior='$caracinterior', carac_exterior = '$caracexterior', carac_extras='$caracextras', 
            carac_inquilino ='$caracinquilino', carac_seguridad='$caracseguridad', carac_reglas='$reglas', 
            carac_='$carac', precio='$precio', park='$parqueaderos', habitaciones='$habitaciones', 
            banos='$banos', ubicacionaddress = '$ubicacion', ubicacionlat = '$latitud', 
            ubicacionlon = '$longitud', departamento = '$departamento', barrio = '$barrio',
            direccion = '$direccion', latitud = '$latituda', longitud = '$longituda',
            nombres = '$nombres', apellidos = '$apellidos', email = '$email', telefono = '$telefono',
            celular = '$celular', administracion = '$administracion', area = '$area',
            ciudad = '$ciudad', codigo_postal = '$codigopostal', fotouser= '$fotousuario',
            urlyoutube = '$urlyoutube', estrato = '$estrato'
            WHERE id=$id";
            
            
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if($ejecutar_consulta==1){
    $status["status"][] = "1";
	$data = $status;
	print_r(json_encode($data));
	if(count($arrayimagenes)>1){
	    for($i=0;$i<(count($arrayimagenes))-1;$i++){
	        $imagen = str_replace("img","",$arrayimagenes[$i]);
	        unlink('../../images/inm/'.$id.'/'.$imagen);
	    }
	    $aimg1  = scandir('../../images/inm/'.$id);
	    for($j=2;$j<count($aimg1);$j++){
	       // echo 'rename(../../images/inm/'.$id.'/'.$aimg[$j].",".'../../images/inm/'.$id.'/'.($j-2).".jpg"."<br>";
	       // echo $aimg[2];
	       $nombreanterior = '../../images/inm/'.$id.'/'.$aimg1[$j];
	       //echo $nombreanterior." ";
	       $nombrenuevo = '../../images/inm/'.$id.'/'.($j-2)."a.jpg";
	       //echo $nombrenuevo."<BR>";
	       rename($nombreanterior,$nombrenuevo);
	     }
	     $aimg2  = scandir('../../images/inm/'.$id);
	    for($k=2;$k<count($aimg2);$k++){
	       // echo 'rename(../../images/inm/'.$id.'/'.$aimg[$j].",".'../../images/inm/'.$id.'/'.($j-2).".jpg"."<br>";
	       // echo $aimg[2];
	       $nombreanterior = '../../images/inm/'.$id.'/'.$aimg2[$k];
	       //echo $nombreanterior." ";
	       $nombrenuevo = '../../images/inm/'.$id.'/'.($k-2).".jpg";
	       //echo $nombrenuevo."<BR>";
	       rename($nombreanterior,$nombrenuevo);
	     }  
	}
}
else{
    $status["status"][] = 0;
	$data = $status;
	print_r(json_encode($data));
}
$conexion->close();
?>