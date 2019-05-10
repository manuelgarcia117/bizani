<?php
session_start();
require_once("../web_control/db.php");
$conexion = new Conexion();
$tipo_pub=$_GET["tipo_pub"];

$use2 = $conexion->prepare("SELECT 
                            * 
                            FROM 
                            tipo_publicacion tp,
                            tipo_inmueble ti,
                            tipo_publicacion_inmueble tpi
                            WHERE tpi.tipu_id=tp.tipu_id
                            AND tpi.tiin_id=ti.tiin_id
                            AND tp.tipu_valor=:tipo_pub;");
							
$use2->bindParam(":tipo_pub",$tipo_pub);
$use2->execute();
$user2 = $use2->fetchAll();

foreach($user2 as $item){
    $tipi_id["id"][] = $item['tipi_id'];
	$tipu_valor["tipu_valor"][] = $item['tipu_valor'];
	$tipu_descripcion["tipu_descripcion"][] = $item['tipu_descripcion'];
	$tiin_valor["tiin_valor"][] = $item['tiin_valor'];
	$tiin_descripcion["tiin_descripcion"][] = $item['tiin_descripcion'];
}

if (!isset($tipu_valor)) {
    print_r("0");
} else {
    $data = $tipi_id+$tipu_valor+$tipu_descripcion+$tiin_valor+$tiin_descripcion;
    print_r(json_encode($data));
}
			 
?>