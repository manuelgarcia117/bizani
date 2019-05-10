<?php 
session_start();
$http = "https:";
$url = $http."//bizani-manuelgarcia117.c9users.io/panel/";
$nombreses = $_SESSION["name_user"];
$rolses = $_SESSION["roles_user"];
if($_SESSION["id_user"]==null){
    echo $_SESSION["id_user"];
echo '<script>
 location.href="https://bizani.com";
</script>';
}
?>