<?php
header('Access-Control-Allow-Origin: *');
require_once("db.php");
$conexion = new Conexion();

if(isset($_GET["id"])){$id = $_GET["id"];} else if(isset($_POST["id"])) { $id=$_POST["id"];} else {$id = 0;}
if(isset($_GET["id_post"])){$id_post = $_GET["id_post"];} else if(isset($_POST["id_post"])) { $id_post=$_POST["id_post"];} else {$id_post = 0;}
if(isset($_GET["fav"])){$fav = $_GET["fav"];} else if(isset($_POST["fav"])) { $fav=$_POST["fav"];} else {$fav = 0;}


if($fav==1){
$consulta2 = $conexion->prepare('INSERT INTO `favorite`(`id_user`, `id_post`) VALUES (:id,:post)');
$consulta2->bindParam(":id",$id);
$consulta2->bindParam(":post",$id_post);
$sta = $consulta2->execute();
} else if($fav==0){
$consulta2 = $conexion->prepare('DELETE FROM `favorite` WHERE id_user=:id AND id_post=:post');
$consulta2->bindParam(":id",$id);
$consulta2->bindParam(":post",$id_post);
$sta = $consulta2->execute();
}

$data = array("null"=>"","ok"=>$sta,"fav"=>$fav,"id_user"=>$id,"id_post"=>$id_post);
print_r(json_encode($data));
?>