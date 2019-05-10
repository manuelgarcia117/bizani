<?php
session_start();
require_once("../web_control/db.php");
$conexion = new Conexion();
$categoria=$_GET["cat"];
//echo $cat;
$use2 = $conexion->prepare("SELECT * FROM `carac` WHERE cat=  '$categoria';");
							
//$use2->bindParam(":cat",$cat);
$use2->execute();
$user2 = $use2->fetchAll();

foreach($user2 as $item){
	$cat["cat"][] = $item['cat']; 
    $id["id"][] = $item['id'];
    $name["name"][] = $item['name'];
	$text["text"][] = $item['text'];
 
}

if (!isset($id)) {
    print_r("0");
} else {
    $data = $id+$name+$text+$cat;
    print_r(json_encode($data));
}
?>