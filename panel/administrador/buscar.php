<?php
session_start();
include("../controller/db.php");
$texto = urldecode((strtoupper($_GET["texto"])));
$pagina = utf8_encode(strtoupper($_GET["pagina"]));
$orden = utf8_encode(strtoupper($_GET["orden"]));
$tipoorden = utf8_encode(strtoupper($_GET["tipoorden"]));
$pagina=($pagina-1)*100;
$consulta = "SELECT * FROM(SELECT	*,(select count(id) FROM panel_user where name LIKE '%$texto%' OR email LIKE '%$texto%' OR id LIKE '%$texto%') AS total
			FROM panel_user
			WHERE name LIKE '%$texto%' OR email LIKE '%$texto%' OR id LIKE '%$texto%'
			ORDER BY id DESC
			LIMIT $pagina,100) AS consulta
			ORDER BY $orden $tipoorden";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
$numReg=$ejecutar_consulta->num_rows;
//  echo $consulta."<br>";
 //echo(crypt("1234"))."<br>";
if($numReg!=0){
    while ($registro=$ejecutar_consulta->fetch_assoc()){
        $id["id"][] = $registro['id'];
	    $name["name"][] = utf8_encode($registro['name']);
        $email["email"][] = utf8_encode($registro['email']);
        $password["password"][] = utf8_encode($registro['password']);
	    $roles["roles"][] = utf8_encode($registro['roles']);
	    $total["total"][] = utf8_encode($registro['total']);;
	    $stat["stat"][] = "1";
    }
    	
    $data = $id+$name+$email+$roles+$stat+$total+$password;
	
}else{
	$stat["stat"][] = "0";
	$data = $stat;

}
$conexion->close();
print_r(json_encode($data));
?>			