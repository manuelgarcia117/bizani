<?php session_start(); 
require_once("db.php");
$conexion = new Conexion();
if(isset($_POST['email'])){
$email = $_POST['email'];
$pass = $_POST['clv'];

$users = $conexion->prepare("SELECT * FROM `user_secure` WHERE  email = ? AND clv = ?");
$users->bindParam(1,$email);
$users->bindParam(2,$pass);
$users->execute();

$rows = $users->fetch(PDO::FETCH_NUM);
if($rows > 0) {
				
					$use = $conexion->prepare("SELECT * FROM `user_secure` WHERE  email = ? AND clv = ?");
					$use->bindParam(1,$email);
					$use->bindParam(2,$pass);
					$use->execute();
					while ($ro = $use->fetch(PDO::FETCH_ASSOC))
					{
						$_SESSION["id_bizani"] = $ro['id'];
						$_SESSION["clv_bizani"] = $ro['clv'];//CUIDADO AL MODIFICAR EL CODIGO....
						$ids = $ro['id'];
						$_SESSION["name_bizani"] = $ro['name'];
						$names = $ro['name'];
						$_SESSION["lastname_bizani"] = $ro['lastname'];
						$lastnames = $ro['lastname'];
						$_SESSION["email_bizani"] = $email;
						$emails = $email;
						$_SESSION["cel_bizani"] = $ro['cel'];
						$cels = $ro['cel'];
						$_SESSION["tel_bizani"] = $ro['tel'];
						$tels = $ro['tel'];
						$_SESSION["code_bizani"] = $ro['code'];
						$codes = $ro['code'];
						$_SESSION["active_bizani"] = $ro['active'];
						$actives = $ro['active'];
						$_SESSION["login_bizani"] = 1;
					}
						$_SESSION["id_bizani"] = $ids;
						$_SESSION["name_bizani"] = $names;
						$_SESSION["lastname_bizani"] = $lastnames;
						$_SESSION["email_bizani"] = $email;
						$_SESSION["cel_bizani"] = $cels;
						$_SESSION["tel_bizani"] = $tels;
						$_SESSION["code_bizani"] = $codes;
						$_SESSION["active_bizani"] = $actives;
						$_SESSION["login_bizani"] = 1;
	$status = "1";
	$data = array("null"=>"0","status"=>$status,"user_id"=>$ids,"name"=>$names,"lastname"=>$lastnames,"email"=>$emails,"cel"=>$cels,"tel"=>$tels,"code"=>$codes,"active"=>$actives);
} else {
	$status = "0";
	$data = array("null"=>"0","status"=>$status);
}
print_r(json_encode($data));
}
?>