<?php
if ($_POST) {
    $id=$_GET["id"];
    $folder="../images/inm/".$id;
    
    if(!is_dir($folder)){
	    mkdir($folder, 0755);
	}
    
    $total_imagenes = count(glob($folder.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
    define('UPLOAD_DIR', $folder.'/');
    $img = $_POST['image'];
    $img = str_replace('data:image/jpeg;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = UPLOAD_DIR .  $total_imagenes . '.jpg';
    $success = file_put_contents($file, $data);
    print $success ? $file : 'Unable to save the file.';
}
?>