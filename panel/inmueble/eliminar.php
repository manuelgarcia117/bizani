<?php
session_start();
include("../controller/db.php");
$id = utf8_encode($_GET["id"]);
$consulta = "DELETE FROM inmueble WHERE id=$id";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if($ejecutar_consulta==1){
    if(file_exists('../../images/inm/'.$id)){
        $arrayimagenes  = scandir('../../images/inm/'.$id);
	    for($i=2;$i<count($arrayimagenes);$i++){
	        unlink('../../images/inm/'.$id."/".$arrayimagenes[$i]);
	    }
        rmdir('../../images/inm/'.$id);
	}
    $status["status"][] = "1";
	$data = $status;
}
else{
    $status["status"][] = "0";
	$data = $status;
}
print_r(json_encode($data));
$conexion->close();
?>