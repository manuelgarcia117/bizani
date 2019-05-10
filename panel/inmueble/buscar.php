<?php
session_start();
include("../controller/db.php");
$texto = urldecode((strtoupper($_GET["texto"])));
$arraytexto = explode(" ",$texto);
$pagina = utf8_encode(strtoupper($_GET["pagina"]));
$orden = utf8_encode(strtoupper($_GET["orden"]));
$tipoorden = utf8_encode(strtoupper($_GET["tipoorden"]));
$pagina=($pagina-1)*100;
$conexion->query(utf8_decode("SET lc_time_names = 'es_CO';"));
$consulta = "SELECT * FROM(SELECT	*,
			(select count(id) FROM inmueble 
			WHERE ";
			for($i=0;$i<count($arraytexto);$i++){
				if($i!=0){
					$consulta.="OR title LIKE '%$arraytexto[$i]%' OR id LIKE '%$arraytexto[$i]%' OR ciudad LIKE '%$arraytexto[$i]%' OR modified LIKE '%$arraytexto[$i]%'";
				}
				else{
					$consulta.="title LIKE '%$arraytexto[$i]%' OR id LIKE '%$arraytexto[$i]%' OR ciudad LIKE '%$arraytexto[$i]%' OR modified LIKE '%$arraytexto[$i]%'"; 
				}
			}
$consulta.= ") AS total,
			IF( CURDATE( ) = DATE_FORMAT( modified,  '%y-%m-%d' ) , CONCAT(  'Hoy, ', DATE_FORMAT( modified,  '%H:%i' ) ) , DATE_FORMAT( modified,  '%d de %M del %Y, %H:%i' ) ) AS modifiedm
			FROM inmueble
			where ";
			for($i=0;$i<count($arraytexto);$i++){
				if($i!=0){
					$consulta.="OR title LIKE '%$arraytexto[$i]%' OR id LIKE '%$arraytexto[$i]%' OR ciudad LIKE '%$arraytexto[$i]%' OR modified LIKE '%$arraytexto[$i]%'";
				}
				else{
					$consulta.="title LIKE '%$arraytexto[$i]%' OR id LIKE '%$arraytexto[$i]%' OR ciudad LIKE '%$arraytexto[$i]%' OR modified LIKE '%$arraytexto[$i]%' "; 
				}
			}
$consulta.="ORDER BY date DESC
			LIMIT $pagina,100) AS consulta
			ORDER BY $orden $tipoorden";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
$numReg=$ejecutar_consulta->num_rows;
//echo $consulta."<br>";
if($numReg!=0){
    while ($registro=$ejecutar_consulta->fetch_assoc()){
        $id["id"][] = $registro['id'];
        unset($arrayimagenes);
	    unset($listaimagenes);
	    $listaimagenes="";
     //   $imagenes["imagenes"][] = $listaimagenes;
    	if(file_exists('../../images/inm/'.$registro['id'])){
    		$arrayimagenes  = scandir('../../images/inm/'.$registro['id']);
	        for($i=2;$i<count($arrayimagenes);$i++){
	        	$listaimagenes.=$arrayimagenes[$i].",";
	        }
	    }
	    $imagenes["imagenes"][] = $listaimagenes;
        $author["author"][] = utf8_encode($registro['author']);
	    $date["date"][] = utf8_encode($registro['date']);
	    $content["content"][] = utf8_encode($registro['content']);
	    $title["title"][] = utf8_encode($registro['title']);
	    $name["name"][] = utf8_encode($registro['name']);
	    $modified["modified"][] = utf8_encode($registro['modified']);
	    $modifiedm["modifiedm"][] = utf8_encode($registro['modifiedm']);
	    $status["status"][] = utf8_encode($registro['status']);
	    $tipopublicacion["tipopublicacion"][] = utf8_encode($registro['tipopublicacion']);
	    $tipoinmueble["tipoinmueble"][] = utf8_encode($registro['tipoinmueble']);
	    $carac_interior["carac_interior"][] = utf8_encode($registro['carac_interior']);
	    $carac_exterior["carac_exterior"][] = utf8_encode($registro['carac_exterior']);
	    $carac_extras["carac_extras"][] = utf8_encode($registro['carac_extras']);
	    $carac_inquilino["carac_inquilino"][] = utf8_encode($registro['carac_inquilino']);
	    $carac_seguridad["carac_seguridad"][] = utf8_encode($registro['carac_seguridad']);
	    $carac_reglas["carac_reglas"][] = utf8_encode($registro['carac_reglas']);
	    $carac_["carac_"][] = utf8_encode($registro['carac_']);
	    $precio["precio"][] = utf8_encode($registro['precio']);
	    $park["park"][] = utf8_encode($registro['park']);
	    $habitaciones["habitaciones"][] = utf8_encode($registro['habitaciones']);
	    $banos["banos"][] = utf8_encode($registro['banos']);
	    $ubicacionaddress["ubicacionaddress"][] = utf8_encode($registro['ubicacionaddress']);
	    $ubicacionlat["ubicacionlat"][] = utf8_encode($registro['ubicacionlat']);
	    $ubicacionlon["ubicacionlon"][] = utf8_encode($registro['ubicacionlon']);
	    $departamento["departamento"][] = utf8_encode($registro['departamento']);
	    $barrio["barrio"][] = utf8_encode($registro['barrio']);
	    $direccion["direccion"][] = utf8_encode($registro['direccion']);
	    $latitud["latitud"][] = utf8_encode($registro['latitud']);
	    $longitud["longitud"][] = utf8_encode($registro['longitud']);
	    $nombres["nombres"][] = utf8_encode($registro['nombres']);
	    $apellidos["apellidos"][] = utf8_encode($registro['apellidos']);
	    $email["email"][] = utf8_encode($registro['email']);
	    $telefono["telefono"][] = utf8_encode($registro['telefono']);
	    $celular["celular"][] = utf8_encode($registro['celular']);
	    $administracion["administracion"][] = utf8_encode($registro['administracion']);
	    $area["area"][] = utf8_encode($registro['area']);
	    $ciudad["ciudad"][] = utf8_encode($registro['ciudad']);
	    $codigo_postal["codigo_postal"][] = utf8_encode($registro['codigo_postal']);
	    $fotouser["fotouser"][] = utf8_encode($registro['fotouser']);
	    $urlyoutube["urlyoutube"][] = utf8_encode($registro['urlyoutube']);
	    $estrato["estrato"][] = utf8_encode($registro['estrato']);
	    $total["total"][] = $registro['total'];
	    $stat["stat"][] = "1";
    }
    	
    $data = $id+$author+$date+$content+$title+$name+$modified+$modifiedm+$status+$tipopublicacion+$tipoinmueble+$carac_interior+$carac_exterior+$carac_extras+$carac_inquilino+$carac_seguridad+$carac_reglas+$carac_+$precio+$park+$habitaciones+$banos+$ubicacionaddress+$ubicacionlat+$ubicacionlon+$departamento+$barrio+$direccion+$latitud+$longitud+$nombres+$apellidos+$email+$telefono+$celular+$administracion+$area+$ciudad+$codigo_postal+$fotouser+$urlyoutube+$estrato+$total+$stat+$imagenes;
	
}else{
	$stat["stat"][] = "0";
	$data = $stat;

}
$conexion->close();

print_r(json_encode($data));
?>			