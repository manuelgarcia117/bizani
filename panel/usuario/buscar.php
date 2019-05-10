<?php
session_start();
include("../controller/db.php");
$texto = utf8_encode(strtoupper($_GET["texto"]));
$arraytexto = explode(" ",$texto);
$pagina = utf8_encode(strtoupper($_GET["pagina"]));
$orden = utf8_encode(strtoupper($_GET["orden"]));
$tipoorden = utf8_encode(strtoupper($_GET["tipoorden"]));
$pagina=($pagina-1)*100;
// if($texto==""){
// 	$texto=" ";
$consulta = "SELECT * FROM(SELECT *,(select count(id) 
            FROM user_secure 
            WHERE ";
            for($i=0;$i<count($arraytexto);$i++){
				if($i!=0){
					$consulta.="OR name LIKE '%$arraytexto[$i]%' OR lastname LIKE '%$arraytexto[$i]%' OR email LIKE '%$arraytexto[$i]%' OR cel LIKE '%$arraytexto[$i]%' OR tel LIKE '%$arraytexto[$i]%' ";
				}
				else{
					$consulta.="name LIKE '%$arraytexto[$i]%' OR lastname LIKE '%$arraytexto[$i]%' OR email LIKE '%$arraytexto[$i]%' OR cel LIKE '%$arraytexto[$i]%' OR tel LIKE '%$arraytexto[$i]%' "; 
				}
			}
$consulta.= ") AS total FROM user_secure
			WHERE ";
			// name LIKE '%$texto%' OR email LIKE '%$texto%' OR lastname LIKE '%$texto%' OR cel LIKE '%$texto%' OR tel LIKE '%$texto%'
            for($i=0;$i<count($arraytexto);$i++){
				if($i!=0){
					$consulta.="OR name LIKE '%$arraytexto[$i]%' OR lastname LIKE '%$arraytexto[$i]%' OR email LIKE '%$arraytexto[$i]%' OR cel LIKE '%$arraytexto[$i]%' OR tel LIKE '%$arraytexto[$i]%' ";
				}
				else{
					$consulta.="name LIKE '%$arraytexto[$i]%' OR lastname LIKE '%$arraytexto[$i]%' OR email LIKE '%$arraytexto[$i]%' OR cel LIKE '%$arraytexto[$i]%' OR tel LIKE '%$arraytexto[$i]%' "; 
				}
			}
$consulta.= "ORDER BY registered DESC
			LIMIT $pagina,100) AS consulta
			ORDER BY $orden $tipoorden";	
	
	
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
$numReg=$ejecutar_consulta->num_rows;
//echo $consulta."<br>";
if($numReg!=0){
    
    while ($registro=$ejecutar_consulta->fetch_assoc()){
        $id["id"][] = $registro['id'];
	    $email["email"][] = utf8_encode($registro['email']);
	    $name["name"][] = utf8_encode($registro['name']);
	    $lastname["lastname"][] = utf8_encode($registro['lastname']);
	    $cel["cel"][] = utf8_encode($registro['cel']);
	    $clave["clave"][] = utf8_encode($registro['clv']);
	    $tel["tel"][] = utf8_encode($registro['tel']);
	    //$password["password"][] = $ro['password'];
	    $total["total"][] = $registro['total'];
	    $fecha["fecha"][] = $registro['registered'];
	    $status["status"][] = "1";
	    
    }
    $data = $id+$email+$name+$lastname+$cel+$tel+$status+$total+$fecha+$clave;
	
}else{
	$status["status"][] = "0";
	$data = $status;

}
$conexion->close();

print_r(json_encode($data));

?>			