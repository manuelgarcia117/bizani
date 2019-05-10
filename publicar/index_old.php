<?php
session_start();
//error_reporting(E_ALL ^ E_NOTICE);
require_once("../web_control/functions.php");
require_once("../web_control/db.php");
require_once("../web_control/vars.php");
$conexion = new Conexion();
$type_nav = 2;
$title = "Publica tu inmueble | Plataforma Inmobiliaria";
?>
<?php //require_once("../controller/carac.php"); ?>
<?php require_once("../template/header.php"); ?>
<?php require_once("../template/jquery.php"); ?>
<?php require_once("../template/nav.php"); ?>
<link href="css/style.css" rel="stylesheet" />
<style>
.menumain {right:0% !important;}
a {color: #6f9d39;}
.publish {display: none;position: fixed;bottom: 0;z-index: 50;background: #6ca212;width: 100%;padding: 10px;font-size: 20px;color: white;text-align: center;box-sizing: border-box;}
.publicarbox {/*max-width: 1062px;*/margin: 0 auto;background: white;padding-top: 80px;overflow-y: auto;overflow-x: hidden;height: 100%;position: relative;box-sizing: border-box;}
.title_pub {font-size: 2.28rem;text-align: center;font-weight: 700;color: dimgrey;}
.title_pub span {font-weight: 200}
.titlepub {width: 100%;margin: 0 auto;font-size: 22px;color: dimgrey;margin-top: 10px;margin-bottom: 10px;}
.publishbox {padding: 0 70px;} .boxuploadimg {cursor:pointer;position: relative;height: auto;min-height: 90px; background: #fff;box-shadow: 8px 10px 15px 0 rgba(0, 0, 0, 0.2);border-radius: 15px;border: 3px dashed #ffa000;margin-top: 10px;}
.msg_ui {text-align: center;top: 25px;position: relative;color: #9E9E9E;font-size: 17px} 
.msg_ui1 {font-size: 15px;}
.boxuploadimg span {font-size: 41px;color: rgba(255, 160, 0, 0.88);float: left;top: -26px;left: 59px;position: relative;}
.boxinput input, .boxinput select, .boxpadd input, .boxpadd select {padding: 12px;padding-right: 30px;border-radius: 5px;border: 1px solid #8BC34A;width: 100%;height: 41px;}
.fullcol {width: 100%; float: left;} .twocol {width: 50%; float: left;}
.row_publish {margin-top: 30px;}
.innerboxinput, .boxpad {padding: 10px;box-sizing: border-box;position: relative;}
.boxinput {padding: 5px;position: relative;}
#des {padding: 12px;border-radius: 5px;border: 1px solid #8BC34A;width: 100%;height: 100px;padding-top: 25px;}
label[for=des] {position: relative;top: -93px;padding-left: 12px;color: #bba9a9;font-size: 14px;}
.inputrem {padding-left: 40px !important;}
.iconboxinput {position: absolute;font-size: 20px;color: darkgray;margin-top: 4px;}
#map_pub {width: 100%; height: 200px;} .title_map {text-align: center;margin-bottom: 10px;color: dimgrey;}
.des_map {padding: 0px 16px;} .des_map div {padding: 5px;float: left;width: 33.33%;box-sizing: border-box;} .des_map div input {width: 100%;padding: 8px;border: 0;border-bottom: 2px solid #8bc34a;border-radius: 0;}
.title_caracter {width: 100%;padding: 10px;background: #797979;border-radius: 5px;box-sizing: border-box;color:white;text-align: center;}
.inputmargin {margin: 5px 0;}
.content_caracter {padding:15px; }
.caracter {width: 25%;float: left;height: 150px;padding: 5px;box-sizing: border-box;}
.caracter .carac_ {height: 100%;width: 100%;text-align: center;box-sizing: border-box; cursor: pointer;border-radius: 8px;transition: all .3s;border: 1px solid white;}
.caracter .carac_:hover {border: 1px solid #8bc34a;}
.finishrow {margin-bottom: 100px;}
.publicar_ {padding: 5px 10px;text-align: center;background: #6f9d39;width: 200px;float: right;font-size: 20px;color: white;border-radius: 5px;cursor: pointer;}
.active_caracter {border: 1px solid #ffa000 !important;}
.empr {margin-top: 10px;}
.emp {width: 120px;height: 40px;float: left;margin: 0 10px;border: 1px solid #6f9d39;text-align: center;color: #696969;line-height: 40px;border-radius: 5px;cursor: pointer;}
.emp:hover {border: 1px solid #ffa000;}
.paq {height: 150px;max-width: 280px;border-radius: 8px;border: 4px dashed #ffa000;margin: 0 auto;}
.titlepaq {border-width: 3px 0 3px 0;color: #6f9d39;text-align: center;font-size: 35px;position: relative;margin-top: 20px;}
.despaq {font-size: 17px;text-align: center;max-width: 160px;margin: 0 auto;}
.a_c {margin-bottom: 30px;} 
.checka_c {margin: 10px;width: 15px;height: 15px;float: left;margin-right: 20px;position: relative;top: -20px;}
@media screen and (max-width: 900px) {
	.publishbox {padding: 0 20px;}
	.title_pub {padding: 0 10px;}
	.titlepub {text-align: center;}
	.boxuploadimg {height: 165px;}
	.boxuploadimg span {text-align: center;width: 100%;top: 20px;left: 0;}
	.msg_ui {top: 20%;}
	.titleinnerboxinput {height: 52px;}
	.caracter {width: 50%;}
	.emp {width: 100%;margin:5px 0;}
	.texta_c {margin-right:20px;margin-left:45px; }
	.publicar_ {box-sizing: border-box;width: 100%;}
}
.valid { display: none;right: 10px;position: absolute;height: 40px; } .valid span { height: 40px;line-height: 30px;color: #8bc34a; }
.glyphicons-remove-sign { color: #c34a4a !important; } .glyphicons-ok-sign { color: #8bc34a !important; }
.valid2, .valid3, .valid4, .valid5, .valid6, .valid7, .valid8, .valid9, .valid10, .valid11, .valid12, .valid13, .valid14, .valid15 {display: block;top: 10px;}
.map_mark {position: relative;background: url(http://www.bizani.com/img/mark.png);background-size: cover;background-position: center;width: 50px;height: 50px;left: 0;right: 0;top: -150px;bottom: 0;margin: 0 auto;}
.iconcarac {
	background: url(../images/strip_icons_bizani.jpg);
background-size: 1000px;
width: 100px;
height: 100px;
margin: 0 auto;
}
.
.textcarac {}
.nodisplay {display: none;}
.pps {background-position-x: -700px;background-position-y: -100px;}
.cl {background-position-x: -100px;background-position-y: 0px;}
.aa {background-position-x: 0px;background-position-y: 0px;}
.cj {background-position-x: -400px;background-position-y: -100px;}
.gm {background-position-x: -500px;background-position-y: -100px;}
.tur {background-position-x: -300px;background-position-y: -200px;}
.bbq {background-position-x: -300px;background-position-y: -100px;}
.vm {background-position-x: -400px;background-position-y: -200px;}
.pa {background-position-x: -0px;background-position-y: -100px;}
.amo {background-position-x: 0px;background-position-y: -500px;}
.scam {background-position-x: -100px;background-position-y: -300px;}
.ct {background-position-x: -200px;background-position-y: -200px;}
.sj {background-position-x: -800px;background-position-y: -100px;}
.st {background-position-x: -100px;background-position-y: -200px;}
.sb {background-position-x: 0px;background-position-y: -200px;}
.sau {background-position-x: -900px;background-position-y: -100px;}
.jz {background-position-x: -600px;background-position-y: -100px;}
.zv {background-position-x: -500px;background-position-y: -200px;}
.cf {background-position-x: -400px;background-position-y: -100px;}
.vp {background-position-x: -400px;background-position-y: -200px;}
.ce {background-position-x: -400px;background-position-y: 0px;}
.pd {background-position-x: -100px;background-position-y: -100px;}
.pc {background-position-x: -200px;background-position-y: 0px;}
.ppor {background-position-x: -200px;background-position-y: -100px;}
.pmm {background-position-x: 100px;background-position-y: 0px;}
.ca {background-position-x: -500px;background-position-y: 0px;}
.cs {background-position-x: -600px;background-position-y: 0px;}
.ch {background-position-x: -300px;background-position-y: 0px;}
.es {background-position-x: -700px;background-position-y: 0px;}
.halc {background-position-x: -800px;background-position-y: 0px;}
.asc {background-position-x: -700px;background-position-y: -200px;}
.asp {background-position-x: -800px;background-position-y: -200px;}
.ss {background-position-x: -100px;background-position-y: -300px;}
.rec {background-position-x: 0px;background-position-y: -300px;}
.ala {background-position-x: -600px;background-position-y: -200px;}
.vig {background-position-x: 100px;background-position-y: -200px;}
.bcom {background-position-y: -300px;background-position-x: -200px;}
.pkp {background-position-y: -300px;background-position-x: -900px;}
.nev {background-position-y: -300px;background-position-x: -500px;}
.lav {background-position-y: -300px;background-position-x: -300px;}
.micro {background-position-y: -300px;background-position-x: -400px;}
.zs {background-position-y: -300px;background-position-x: -600px;}
.hom {background-position-y: -400px;background-position-x: -200px;}
.muj {background-position-y: -400px;background-position-x: -600px;}
.noim {background-position-y: -400px;background-position-x: -800px;}
.tud {background-position-y: -400px;background-position-x: -100px;}
.pro {background-position-y: -400px;background-position-x: -900px;}
.mix {background-position-y: -400px;background-position-x: -500px;}
.jov {background-position-y: -400px;background-position-x: -300px;}
.may {background-position-y: -400px;background-position-x: -400px;}
.bp {background-position-y: -500px;background-position-x: -100px;}
.perf {background-position-y: -500px;background-position-x: -200px;}
.pera {background-position-y: -500px;background-position-x: -300px;}
.perp {background-position-y: -500px;background-position-x: -400px;}
.pern {background-position-y: -400px;background-position-x: -700px;}
.cc {background-position-y: -500px;background-position-x: -600px;}
.bcol {background-position-y: -500px;background-position-x: -500px;}
.jd {background-position-y: -500px;background-position-x: -700px;}
.lr {background-position-y: -600px;background-position-x: 0px;}
.sc {background-position-y: -600px;background-position-x: -100px;}
.prr {background-position-y: -500px;background-position-x: -900px;}
.jtr {background-position-y: -500px;background-position-x: -800px;}
.oc {background-position-y: -600px;background-position-x: -300px;}
.vu {background-position-y: -600px;background-position-x: -400px;}
.bcom {background-position-y: -300px;background-position-x: -200px;}
.vml {background-position-y: -600px;background-position-x: -700px;}
.vb {background-position-y: -600px;background-position-x: -200px;}
.tof {background-position-y: -600px;background-position-x: -600px;}
.activeemp {background: #95c742;color: white;}
#up_items {list-style-type: none;margin: 20px 0;}
#up_items li {width: 100%;margin: 12px 0;border-style: solid;border-color: #95c742;border-width: 1px 1px 1px 1px;padding: 10px;box-sizing: border-box;border-radius: 8px;}
#up_items li img {width: 100%;border-radius: 5px;}
.imgdiv {width: 130px;float: left;margin-right: 10px;}
.detail_i {float: left;}
.actions_i {float: right;color: #a50000;cursor: pointer;font-size: 20px;top: 0px;position: relative;width: 120px;text-align: right;}

@media screen and (max-width: 900px) {
	.twocol {
	    width: 100%;
	    float: left;
	}
}
.glyphicon-asterisk:before {
  content: "\2a";
}


</style>
<div class="content" style="background: white;">
	<div class="publicarbox">
		<div class="title_pub"><span>Hola,</span> Publica Gratis tu Inmueble</div>
		<div class="publishbox">
			
			<div class="msg_ui">Revisa que los campos obligatorios (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>) de tu información esten verificados con 
				 <span style="margin-top: -4px;" class="glyphicons glyphicons-ok-sign"></span>
			</div>
			<div class="row_publish clearfix">
				<div class="titlepub">Fotos del Inmueble</div>
				<div class="boxuploadimg clearfix" id="drop" onclick="$('#images_').click();">
					<div class="msg_ui">
						<div class="msg_ui1">Arrastra o haz click aquí para subir las fotos del inmueble (hasta un máximo de 20).</div>
						La primera imagen será la imagen de portada.
					</div>
				</div>
				<input type="file" name="files[]" id="images_" style="display:none" multiple="true" accept="image/jpeg, image/png">
			<ul class="up_items clearfix" id="up_items"></ul>
		</div>
		<div class="row_publish clearfix">
			<div class="titlepub">Link Youtube (opcional) </div>
			<div class="boxinput boxpad">
				<input type="text" placeholder="Ejemplo: https://www.youtube.com/watch?v=z-BQMmlCUc0" class="fullcol" id="youtube"> <div class="valid valid1"><span class="glyphicons"></span></div>
			</div>
		</div>
		<div class="row_publish clearfix">
			<div class="titlepub">Inmueble</div>
			<div class="boxinput">
				<div class="innerboxinput twocol"><div class="titleinnerboxinput">¿Qué quieres publicar?</div>
				<select id="inmpublish">
					<option value="habitacion">Habitación en Arriendo</option>
					<option value="venta_vivienda">Vivienda en Venta</option>
					<option value="arriendo_vivienda">Vivienda en Arriendo</option>
					<option value="venta_negocio">Negocio en Venta</option>
					<option value="arriendo_negocio">Negocio en Arriendo</option>
					<option value="vacacional">Alquiler Vacacional</option>
				</select>
			</div>
			
			<div class="innerboxinput twocol"><div class="titleinnerboxinput">Tipo de Inmueble </div>
			<select id="tipoinm">
				<option value="apartamento">Apartamento</option>
				<option value="casa">Casa</option>
				<option value="finca">Finca</option>
				<option value="lote">Lote</option>
				<option value="apartamento">Apartaestudio</option>
				<option value="viviendo_loft">Vivienda Loft</option>
			</select>
		</div>
	</div>
</div>
<div class="row_publish clearfix">
	<div class="titlepub">Título y Descripción (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput">
			<input type="text" placeholder="Título (minimo 5 letras) " id="titulo"><div class="valid validateok valid2"><span id="span_titulo" class="glyphicons"></span></div>
		</div>
		<div class="innerboxinput">
			<textarea id="des"></textarea><div class="valid validateok valid3"><span id="span_descripcion" class="glyphicons"></span></div>
			<label for="des" class="transition">Descripción (minimo 11 letras) </label>
		</div>
	</div>
</div>
<div class="row_publish clearfix" style="margin-top:0">
	<div class="titlepub">Especificaciones (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-usd"></i></div>
			<input type="num" class="inputrem" placeholder="Precio" id="precio"><div class="valid validateok valid4"><span id="span_precio" class="glyphicons"></span></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-old-man prefix"></i></div>
			<input type="text" class="inputrem" placeholder="Gastos de Administración" id="admin"><div class="valid validateok valid5"><span id="span_administracion" class="glyphicons"></span></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-user-asterisk prefix"></i></div>
			<input type="text" class="inputrem" placeholder="Estrato" id="estrato"><div class="valid validateok valid6"><span id="span_estrato" class="glyphicons"></span></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-vector-path-square prefix"></i></div>
			<input type="text" class="inputrem" placeholder="Área (metros cuadrados)" id="area_"><div class="valid validateok valid7"><span id="span_area" class="glyphicons"></span></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-car prefix"></i></div>
			<input type="text" class="inputrem" placeholder="Número de Parqueaderos" id="park_"><div class="valid validateok valid8"><span id="span_park" class="glyphicons"></span></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="cuarto_ glyphicons glyphicons-bed-alt"></i></div>
			<input type="text" class="inputrem" placeholder="Número de Habitaciones" id="cuarto"><div class="valid validateok valid9"><span id="span_cuarto" class="glyphicons"></span></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-bath-bathtub prefix"></i></div>
			<input type="text" class="inputrem" placeholder="Número de Baños" id="banos"><div class="valid validateok valid10"><span id="span_banos" class="glyphicons"></span></div>
		</div>
	</div>
</div>
<div class="row_publish clearfix">
	<div class="titlepub">Ubicación (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-search"></i></div>
			<input type="text" class="inputrem" placeholder="Ejemplo: Avenida Colón # 3 - 40, Cúcuta, Colombia" id="searchpublicar">
		</div>
		<div class="innerboxinput fullcol">
			<div class="title_map">Arrastra el icono de Bizani hasta tu dirección</div>
			<div id="map_pub"></div>
			<div class="map_mark"></div>
		</div>
		<input type="text" id="lat" style="display:none">
		<input type="text" id="lng" style="display:none">
	</div>
</div>
<div class="row_publish clearfix">
	
	<?php
		$interior = "Caracteristicas en el Interior";
		$exterior = "Caracteristicas en el Exterior";
		$extras = "Caracteristicas Extras";
		$seguridad = "Caracteristicas de Seguridad";
		$inquilino = "Tipo de Inquilino";
		$reglas = "Reglas del Inmueble";
		$normal = "Caracteristicas";
		$use = $conexion->prepare("SELECT * FROM `carac` GROUP BY `tipo`");
		$use->execute();
		while ($row = $use->fetch(PDO::FETCH_ASSOC)) {
		$tipo[]=$row["tipo"];
		}
	for ($i=0; $i < count($tipo); $i++) {
		$use2 = $conexion->prepare("SELECT * FROM `carac` where `tipo`=:tipo GROUP BY `cat`");
		$use2->bindParam(":tipo",$tipo[$i]);
		$use2->execute();
		while ($row2 = $use2->fetch(PDO::FETCH_ASSOC)) {
	?>
	<div class="titlepub <?=$row2["tipo"]?> <?=$row2["cat"]?> nodisplay" ><?php echo ${$row2["cat"]}; ?></div>
	<div class="content_caracter <?=$row2["tipo"]?> <?=$row2["cat"]?> nodisplay clearfix" data-cats="<?=$row2["cat"]?>">
		<?php
		$use3 = $conexion->prepare("SELECT * FROM `carac` where `tipo`=:tipo AND `cat`=:cat");
		$use3->bindParam(":tipo",$tipo[$i]);
		$use3->bindParam(":cat",$row2["cat"]);
		$use3->execute();
		while ($row3 = $use3->fetch(PDO::FETCH_ASSOC)) {
		?>
		<div class="caracter" data-caracinner="<?=$row3["name"]?>" data-caracoutter="<?=$row2["tipo"]?>" data-cat="<?=$row2["cat"]?>"><div class="carac_" data-caracinner="<?=$row3["name"]?>" data-caracoutter="<?=$row2["tipo"]?>" data-cat="<?=$row2["cat"]?>"><div class="iconcarac <?=$row3["name"]?>"></div> <div class="textcarac"><?=$row3["text"]?></div></div></div>
		<?php
		}
		?>
	</div>
	<?php
	}
	}
	?>
</div>
<div class="row_publish clearfix">
	<div class="titlepub">Información de Contacto (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="profile_vender"></div>
	<div class="boxinput">
		
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-user"></i></div>
			<?php if (isset($_SESSION["name_bizani"])){ 
			$n=$_SESSION["name_bizani"]." ".$_SESSION["lastname_bizani"];
			$array = explode(" ", $n);
			$array[2]=str_replace("0", "",$array[2]);
			$array[3]=str_replace("0", "",$array[3]);
			?>
				<input type="text" class="inputrem" placeholder="Nombres" id="nombre" value="<?=$array[0]." ".$array[1]?>" >
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="Nombres" id="nombre">
			<?php } ?>	

			<div class="valid validateok valid11"><span class="glyphicons"></span></div>
		</div>
		
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-user"></i></div>
			
			<?php if (isset($_SESSION["lastname_bizani"])){ ?>
				<input type="text" class="inputrem" placeholder="Apellidos" id="apellido" value="<?=$array[2]." ".$array[3]?>">
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="Apellidos" id="apellido">
			<?php } ?>	
			
			
			<div class="valid validateok valid12"><span class="glyphicons"></span></div>
		</div>
		
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-envelope"></i></div>
			<?php if (isset($_SESSION["email_bizani"])){ ?>
				<input type="text" class="inputrem" placeholder="E-mail" id="email" value="<?=$_SESSION["email_bizani"]?>">
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="E-mail" id="email">
			<?php } ?>	

			<div class="valid validateok valid13"><span class="glyphicons"></span></div>
		</div>
		
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-earphone"></i></div>
			
			<?php if (isset($_SESSION["cel_bizani"])){ ?>
				<input type="text" class="inputrem" placeholder="Celular" id="celular" value="<?=$_SESSION["cel_bizani"]?>">
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="Celular" id="celular">
			<?php } ?>
			
			<div class="valid validateok valid14"><span class="glyphicons"></span></div>
		</div>
		
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-phone-alt"></i></div>
			
			<?php if (isset($_SESSION["tel_bizani"])){ ?>
				<input type="text" class="inputrem" placeholder="Télefono Fijo (opcional)" id="tel" value="<?=$_SESSION["tel_bizani"]?>">
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="Télefono Fijo (opcional)" id="tel">
			<?php } ?>	
			<div class="valid valid15"><span class="glyphicons"></span></div>
		</div>
		
		<!--<div class="innerboxinput fullcol">
			<div class="titlepub">Yo soy</div>
			<div class="empr clearfix"><div class="emp transition emp1" data-id="1">Inmobiliaria</div><div class="emp transition emp2" data-id="2">Constructora</div><div class="emp transition emp3" data-id="3">Particular</div></div>
		</div>-->
	</div>
</div>
<div class="row_publish clearfix">
	<div class="titlepub">Tu Paquete</div>
	<div class="boxinput">
		<div class="paq">
			<div class="innerpaq">
				<div class="titlepaq">30 Días</div>
				<div class="despaq">Tu inmueble se publicará por 30 días</div>
			</div>
		</div>
	</div>
</div>
<div class="row_publish clearfix finishrow">
	<div class="boxinput">
		<div class="a_c"> <div class="checka_c"><input type="checkbox" id="check_id"> </div><div class="texta_c">He leído, entendido y acepto los <a href="#">términos</a>, <a href="#">condiciones</a> y reconocer la <a href="#">política de confidencialidad</a>.</div></div>
		<div class="publicar_">Publicar</div>
	</div>
</div>
</div>
</div>
</div>
<div class="publish o">Publicar</div>
<input type="text" id="corrects" style="display:none" value="0">
<?php require_once("../template/login_glass.php"); ?>
<!-- jQuery -->
<?php require_once("../template/includes.php"); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1O_uB-8OwIx8zNunB_Oo3HJ5KiGOWcQ8&libraries=places,drawing&callback=initPublicar" defer></script>
<script>



var type_icon;
$(".ha").show();
var carac_p = "ha";
$("#inmpublish").change(function(){
var inm = $("#inmpublish ").val();
switch(inm) {
case "habitacion":
$(".ha, .v, .a, .n").hide();
$(".ha").show();
carac_p="ha";
$(".cuarto_").removeClass("glyphicons-briefcase");
$(".cuarto_").addClass("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Cuartos");
break;
case "arriendo_vivienda":
$(".ha, .v, .a, .n").hide();
$(".v").show();
carac_p="v";
$(".cuarto_").removeClass("glyphicons-briefcase");
$(".cuarto_").addClass("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Cuartos");
break;
case "venta_vivienda":
$(".ha, .v, .a, .n").hide();
$(".v").show();
carac_p="v";
$(".cuarto_").removeClass("glyphicons-briefcase");
$(".cuarto_").addClass("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Cuartos");
break;
case "arriendo_negocio":
$(".ha, .v, .a, .n").hide();
$(".n").show();
carac_p="n";
$(".cuarto_").removeClass("glyphicons-bed-alt");
$(".cuarto_").addClass("glyphicons-briefcase");
$("#cuarto").attr("placeholder","Oficinas");
break;
case "venta_negocio":
$(".ha, .v, .a, .n").hide();
$(".n").show();
carac_p="n";
$(".cuarto_").removeClass("glyphicons-bed-alt");
$(".cuarto_").addClass("glyphicons-briefcase");
$("#cuarto").attr("placeholder","Oficinas");
break;
case "vacacional":
$(".ha, .v, .a, .n").hide();
$(".a").show();
carac_p="a";
$(".cuarto_").removeClass("glyphicons-briefcase");
$(".cuarto_").addClass("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Cuartos");
break;
default:
break;
}
});
var map;
var placeSearch, autocomplete;
function initPublicar() {
var styledMap = new google.maps.StyledMapType(styles,
{name: "Bizani"});
map = new google.maps.Map(document.getElementById('map_pub'), {
center: {lat:7.8890971 , lng: -72.4966896},
zoom: 15,
disableDefaultUI: true,
mapTypeControl: true,
draggable: true,
zoomControl: true,
scaleControl: true,
mapTypeControlOptions: {
style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
mapTypeIds: [
google.maps.MapTypeId.ROADMAP, 'map_style',
google.maps.MapTypeId.TERRAIN
]
},
scrollwheel: false
});
map.mapTypes.set('map_style', styledMap);
map.setMapTypeId('map_style');
// Create the autocomplete object, restricting the search to geographical
// location types.
autocompletep = new google.maps.places.Autocomplete(
/** @type {!HTMLInputElement} */(document.getElementById('searchpublicar')),
{types: ['geocode'],
componentRestrictions: {country: "co"}
});
autocompletep.addListener('place_changed', fillInAddress);
var geocoder = new google.maps.Geocoder();
	map.addListener('dragend', function() {
					$('#lat').val(map.getCenter().lat());
					var lat_pu = map.getCenter().lat();
					$('#lng').val(map.getCenter().lng());
					var lng_pu = map.getCenter().lng();
					url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat_pu + ',' + lng_pu + '&sensor=true';
					$.getJSON( url, function( data ) {
						console.log(data);
						$('#searchpublicar').val(
							data.results[0].address_components[1].long_name + ' # ' +
							data.results[0].address_components[0].long_name + ', ' +
							data.results[0].address_components[2].long_name + ', ' +
							data.results[0].address_components[3].long_name);
					});
	});
}
		function fillInAddress() {
			var place = autocompletep.getPlace();
			b_lat = place.geometry.location.lat();
			b_lng = place.geometry.location.lng();
			pan(b_lat,b_lng);
		}
		function pan(lat,lng) {
	var panPoint = new google.maps.LatLng(lat, lng);
	map.panTo(panPoint);
	map.setZoom(16);
	$('#lat').val(lat);
	$('#lng').val(lng);
	}
		function geocodeAddress(geocoder, resultsMap, coding, zoom) {
				geocoder.geocode({'address': coding}, function(results, status) {
					if (status === google.maps.GeocoderStatus.OK) {
						map.setCenter(results[0].geometry.location);
						map.setZoom(zoom);
						$('.latlang input').val(map.getCenter());
						$('.latlang input').attr('lat', map.getCenter().lat);
						$('.latlang input').attr('lng', map.getCenter().lng);
					} else {
						//alert('Geocode was not successful for the following reason: ' + status);
					}
				});
		}
<?php if($type==0) { ?> var xw=0; <?php } else { ?> var xw=1; <?php } ?>
if(xw==1){
$(".caracter .carac_").click(function(){
$this = $(this);
if($this.hasClass("active_caracter")){
$this.removeClass("active_caracter");
} else {
$this.addClass("active_caracter");
}
});
$("#youtube").keyup(function(){
var val = $(this).val();
if(val!=""){
$(".valid1").show();
var matches = val.match(/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/);
if (matches) {
$(".valid1 span").removeClass("glyphicons-remove-sign")
$(".valid1 span").addClass("glyphicons-ok-sign");
} else {
$(".valid1 span").removeClass("glyphicons-ok-sign")
$(".valid1 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid1").hide();
}
});
$("#titulo").keyup(function(){
var val = $(this).val();
if(val!=""){
$(".valid2").show();
if(val.length>4){
$(".valid2 span").removeClass("glyphicons-remove-sign")
$(".valid2 span").addClass("glyphicons-ok-sign");
} else {
$(".valid2 span").removeClass("glyphicons-ok-sign")
$(".valid2 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid2").hide();
}
});
$("#des").keyup(function(){
var val = $(this).val();
if(val!=""){
$(".valid3").show();
if(val.length>10){
$(".valid3 span").removeClass("glyphicons-remove-sign")
$(".valid3 span").addClass("glyphicons-ok-sign");
} else {
$(".valid3 span").removeClass("glyphicons-ok-sign")
$(".valid3 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid3").hide();
}
});
$("#precio").keyup(function(){
var val = $(this).val();
if(val!=""){
$(".valid4").show();
if(val.length>5){
$(".valid4 span").removeClass("glyphicons-remove-sign")
$(".valid4 span").addClass("glyphicons-ok-sign");
} else {
$(".valid4 span").removeClass("glyphicons-ok-sign")
$(".valid4 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid4").hide();
}
});
$("#admin").keyup(function(){
var val = $(this).val();
if(val!=""){
$(".valid5").show();
$(".valid5 span").removeClass("glyphicons-remove-sign")
$(".valid5 span").addClass("glyphicons-ok-sign");
} else {
$(".valid5").hide();
$(".valid5 span").removeClass("glyphicons-ok-sign")
$(".valid5 span").addClass("glyphicons-remove-sign");
}
});
$("#estrato").keyup(function(){
var val = $(this).val();
if(val!=""){
if(!isNaN(val)){
$(".valid6").show();
$(".valid6 span").removeClass("glyphicons-remove-sign")
$(".valid6 span").addClass("glyphicons-ok-sign");
} else {
$(".valid6 span").removeClass("glyphicons-ok-sign")
$(".valid6 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid6").hide();
$(".valid6 span").removeClass("glyphicons-ok-sign")
$(".valid6 span").addClass("glyphicons-remove-sign");
}
});
$("#area_").keyup(function(){
var val = $(this).val();
if(val!=""){
if(!isNaN(val)){
$(".valid7").show();
$(".valid7 span").removeClass("glyphicons-remove-sign")
$(".valid7 span").addClass("glyphicons-ok-sign");
} else {
$(".valid7 span").removeClass("glyphicons-ok-sign")
$(".valid7 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid7").hide();
$(".valid7 span").removeClass("glyphicons-ok-sign")
$(".valid7 span").addClass("glyphicons-remove-sign");
}
});
$("#park_").keyup(function(){
var val = $(this).val();
if(val!=""){
if(!isNaN(val)){
$(".valid8").show();
$(".valid8 span").removeClass("glyphicons-remove-sign")
$(".valid8 span").addClass("glyphicons-ok-sign");
} else {
$(".valid8 span").removeClass("glyphicons-ok-sign")
$(".valid8 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid8").hide();
$(".valid8 span").removeClass("glyphicons-ok-sign")
$(".valid8 span").addClass("glyphicons-remove-sign");
}
});
$("#cuarto").keyup(function(){
var val = $(this).val();
if(val!=""){
if(!isNaN(val)){
$(".valid9").show();
$(".valid9 span").removeClass("glyphicons-remove-sign")
$(".valid9 span").addClass("glyphicons-ok-sign");
} else {
$(".valid9 span").removeClass("glyphicons-ok-sign")
$(".valid9 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid9").hide();
$(".valid9 span").removeClass("glyphicons-ok-sign")
$(".valid9 span").addClass("glyphicons-remove-sign");
}
});
$("#banos").keyup(function(){
var val = $(this).val();
if(val!=""){
if(!isNaN(val)){
$(".valid10").show();
$(".valid10 span").removeClass("glyphicons-remove-sign")
$(".valid10 span").addClass("glyphicons-ok-sign");
} else {
$(".valid10 span").removeClass("glyphicons-ok-sign")
$(".valid10 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid10").hide();
$(".valid10 span").removeClass("glyphicons-ok-sign")
$(".valid10 span").addClass("glyphicons-remove-sign");
}
});
$("#nombre").keyup(function(){
var val = $(this).val();
if(val!=""){
$(".valid11").show();
$(".valid11 span").removeClass("glyphicons-remove-sign")
$(".valid11 span").addClass("glyphicons-ok-sign");
} else {
$(".valid11").hide();
$(".valid11 span").removeClass("glyphicons-ok-sign")
$(".valid11 span").addClass("glyphicons-remove-sign");
}
});
$("#apellido").keyup(function(){
var val = $(this).val();
if(val!=""){
$(".valid12").show();
$(".valid12 span").removeClass("glyphicons-remove-sign")
$(".valid12 span").addClass("glyphicons-ok-sign");
} else {
$(".valid12").hide();
$(".valid12 span").removeClass("glyphicons-ok-sign")
$(".valid12 span").addClass("glyphicons-remove-sign");
}
});
$("#email").keyup(function(){
var val = $(this).val();
if(val!=""){
if (validateEmail(val)) {
$(".valid13").show();
$(".valid13 span").removeClass("glyphicons-remove-sign")
$(".valid13 span").addClass("glyphicons-ok-sign");
} else {
$(".valid13 span").removeClass("glyphicons-ok-sign")
$(".valid13 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid13").hide();
}
});
$("#celular").keyup(function(){
var val = $(this).val();
if(val!=""){
if(!isNaN(val)){
$(".valid14").show();
$(".valid14 span").removeClass("glyphicons-remove-sign")
$(".valid14 span").addClass("glyphicons-ok-sign");
} else {
$(".valid14 span").removeClass("glyphicons-ok-sign")
$(".valid14 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid14").hide();
$(".valid14 span").removeClass("glyphicons-ok-sign")
$(".valid14 span").addClass("glyphicons-remove-sign");
}
});
$("#tel").keyup(function(){
var val = $(this).val();
if(val!=""){
if(!isNaN(val)){
$(".valid15").show();
$(".valid15 span").removeClass("glyphicons-remove-sign")
$(".valid15 span").addClass("glyphicons-ok-sign");
} else {
$(".valid15 span").removeClass("glyphicons-ok-sign")
$(".valid15 span").addClass("glyphicons-remove-sign");
}
} else {
$(".valid15").hide();
$(".valid15 span").removeClass("glyphicons-ok-sign")
$(".valid15 span").addClass("glyphicons-remove-sign");
}
});
$(".ha").show();
var carac_p = "ha";
$("#inmpublish").change(function(){
var inm = $("#inmpublish ").val();
switch(inm) {
case "habitacion":
$(".ha, .v, .a, .n").hide();
$(".ha").show();
carac_p="ha";
$(".cuarto_").remove("glyphicons-briefcase");
$(".cuarto_").addClass("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Cuartos");
break;
case "arriendo_vivienda":
$(".ha, .v, .a, .n").hide();
$(".v").show();
carac_p="v";
$(".cuarto_").remove("glyphicons-briefcase");
$(".cuarto_").addClass("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Cuartos");
break;
case "venta_vivienda":
$(".ha, .v, .a, .n").hide();
$(".v").show();
carac_p="v";
$(".cuarto_").remove("glyphicons-briefcase");
$(".cuarto_").addClass("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Cuartos");
break;
case "arriendo_negocio":
$(".ha, .v, .a, .n").hide();
$(".n").show();
carac_p="n";
$(".cuarto_").addClass("glyphicons-briefcase");
$(".cuarto_").remove("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Oficinas");
break;
case "venta_negocio":
$(".ha, .v, .a, .n").hide();
$(".n").show();
carac_p="n";
$(".cuarto_").addClass("glyphicons-briefcase");
$(".cuarto_").remove("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Oficinas");
break;
case "vacacional":
$(".ha, .v, .a, .n").hide();
$(".a").show();
carac_p="a";
$(".cuarto_").remove("glyphicons-briefcase");
$(".cuarto_").addClass("glyphicons-bed-alt");
$("#cuarto").attr("placeholder","Cuartos");
break;
default:
break;
}
});
$(".publicar_").click(function(){


if(!$("#span_titulo").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Titulo.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_descripcion").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Descripción.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_precio").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Precio.",
	type: "warning"
	});
	
return false;
}


if(!$("#span_administracion").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Precio.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_estrato").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Estrato.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_park").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un número de Baños.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_cuarto").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un número de Habitaciones.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_banos").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un número de Baños.",
	type: "warning"
	});
	
return false;
}

});
$("#precio").keyup(function(){
$(this).val(format($(this).val()));
});
$("#admin").keyup(function(){
$(this).val(format($(this).val()));
});
var format = function(num){
var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
if(str.indexOf(".") > 0) {
parts = str.split(".");
str = parts[0];
}
str = str.split("").reverse();
for(var j = 0, len = str.length; j < len; j++) {
if(str[j] != ",") {
output.push(str[j]);
if(i%3 == 0 && j < (len - 1)) {
output.push(",");
}
i++;
}
}
formatted = output.reverse().join(""); 
return("$" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};
var imgs = [];
var j = 0;
$("#images_").change(function(){
if(imgs.length<20){
if(window.File && window.FileList && window.FileReader)
{
var files = event.target.files; //FileList object
for(var i = 0; i< files.length; i++)
{
var fil = files[i];
if(!fil.type.match('image')){ continue; }
(function(file) {
var name = file.name;
var size = file.size;
var picReader = new FileReader();
console.log(files[i]);
picReader.addEventListener("load",function(event){
var picFile = event.target;
$("#up_items").append("<li class='clearfix li"+j+"'><div class='imgdiv'><img class='thumbnail' src='" + picFile.result + "'" + "title='" + name + "'/></div><div class='actions_i' data-id="+j+"> Borrar </div><div class='detail_i'><h3>"+name.substring(0, 10)+' ...'+"</h3><p>"+formatBytes(size)+"</p></div></li>");
j++;
});
imgs.push(file);
picReader.readAsDataURL(file);
})(files[i]);
}
}
} else {
swal({
title: "Solo puedes subir un maximo de 20 imagenes",
text: "Si necesitas subir más, ponte en contacto con nosotros.",
type: "warning"
});
}
});
function formatBytes(bytes,decimals) {
if(bytes == 0) return '0 Byte';
var k = 1000; // or 1024 for binary
var dm = decimals + 1 || 3;
var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
var i = Math.floor(Math.log(bytes) / Math.log(k));
return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
$("#up_items").on("click",".actions_i",function(){
var t = $(this).data("id");
$(".li"+t).remove();
var index = imgs.indexOf(t);
imgs.removes(index);
console.log(imgs);
});
Array.prototype.removes = function(from, to) {
var rest = this.slice((to || from) + 1 || this.length);
this.length = from < 0 ? this.length + from : from;
return this.push.apply(this, rest);
};

var tipoperson;
$(".publicar_").click(function(){



if(!$("#span_titulo").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Titulo.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_descripcion").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Descripción.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_precio").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Precio.",
	type: "warning"
	});
	
return false;
}


if(!$("#span_precio").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Precio.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_estrato").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un valor para el Estrato.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_park").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un número de Baños.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_cuarto").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un número de Habitaciones.",
	type: "warning"
	});
	
return false;
}

if(!$("#span_banos").hasClass("glyphicons glyphicons-ok-sign")){
	swal({
	title: "Campos Incorrectos",
	text: "Ingrese un número de Baños.",
	type: "warning"
	});
	
return false;
}


console.log(exterior);
var active = <?php if(isset($_SESSION['id_bizani'])){echo "true";}else{echo "false";}?>;
if(active){
var num = $(".validateok .glyphicons-ok-sign").length;
console.log(num);
if(num>12){
if(imgs.length>0){
var lat = $("#lat").val();
var lng = $("#lng").val();
if(lat!="" && lng!="" && searchpublicar!=""){
//if(tipoperson>0){
if($('#check_id').is(":checked")){
var unique = [];
var c_show = [];
var interior = [];
var exterior = [];
var extras = [];
var inquilino = [];
var seguridad = [];
var reglas = [];
$('*[data-caracoutter="'+carac_p+'"]').each(function(){
c_show.push($(this).data("cat"));
unique = c_show.filter(function(elem, index, self) {
return index == self.indexOf(elem);
});
}).promise().done(function(){
for (var i = 0; i < unique.length; i++) {
if(unique[i]=="interior"){
$('.active_caracter[data-caracoutter="'+carac_p+'"][data-cat="'+unique[i]+'"]').each(function(){
interior.push($(this).data("caracinner"));
});
console.log("interior: ");
console.log(interior);
}
if(unique[i]=="exterior"){
$('.active_caracter[data-caracoutter="'+carac_p+'"][data-cat="'+unique[i]+'"]').each(function(){
exterior.push($(this).data("caracinner"));
});
console.log("exteriror: ");
console.log(exterior);
}
if(unique[i]=="extras"){
$('.active_caracter[data-caracoutter="'+carac_p+'"][data-cat="'+unique[i]+'"]').each(function(){
extras.push($(this).data("caracinner"));
});
console.log("extras : ");
console.log(extras);
}
if(unique[i]=="inquilino"){
$('.active_caracter[data-caracoutter="'+carac_p+'"][data-cat="'+unique[i]+'"]').each(function(){
inquilino.push($(this).data("caracinner"));
});
console.log("inquilino: ");
console.log(inquilino);
}
if(unique[i]=="seguridad"){
$('.active_caracter[data-caracoutter="'+carac_p+'"][data-cat="'+unique[i]+'"]').each(function(){
seguridad.push($(this).data("caracinner"));
});
console.log("seguridad: ");
console.log(seguridad);
}
if(unique[i]=="reglas"){
$('.active_caracter[data-caracoutter="'+carac_p+'"][data-cat="'+unique[i]+'"]').each(function(){
reglas.push($(this).data("caracinner"));
});
console.log("reglas : ");
console.log(reglas);
}
}
});
if($("#youtube").val()!=""){var link = $("#youtube").val();}else{var link=0;}
var inmpublish = $("#inmpublish").val();
var tipoinm = $("#tipoinm").val();
var titulo = $("#titulo").val();
var des = $("#des").val();
var precio_ = $("#precio").val();
var precio__ = precio_.split('.').join("");
var precio___ = precio__.split(',').join("");
var precio = precio___.split('$').join("");
var admin_ = $("#admin").val();
var admin__ = admin_.split('.').join("");
var admin___ = admin__.split(',').join("");
var admin = admin___.split('$').join("");
var estrato = $("#estrato").val();
var area_ = $("#area_").val();
var park_ = $("#park_").val();
var cuarto = $("#cuarto").val();
var banos = $("#banos").val();
var searchpublicar = $("#searchpublicar").val();
var lat = $("#lat").val();
var lng = $("#lng").val();
var nombre = $("#nombre").val();
var apellido = $("#apellido").val();
var email = $("#email").val();
var celular = $("#celular").val();
if($("#tel").val()!=""){var tel = $("#tel").val();}else{var tel=0;}
var soy = $(".activeemp").data("id");
var id= <?php if(isset($_SESSION['id_bizani'])){echo $_SESSION['id_bizani'];}else{echo "0";}?>;
console.log(inmpublish+"\n"+tipoinm+"\n"+titulo+"\n"+des+"\n"+precio+"\n"+admin+"\n"+estrato+"\n"+area_+"\n"+park_+"\n"+cuarto+"\n"+banos+"\n"+searchpublicar+"\n"+lat+"\n"+lng+"\n"+nombre+"\n"+apellido+"\n"+email+"\n"+celular+"\n"+tel+"\n"+soy);

console.log(interior+"\n"+exterior+"\n"+extras+"\n"+inquilino+"\n"+seguridad+"\n");
console.log(interior);
console.log(imgs);
var form_data = new FormData();
form_data.append('id',id);
form_data.append('link',link);
form_data.append('inmpublish',inmpublish);
form_data.append('tipoinm',tipoinm);
form_data.append('titulo',titulo);
form_data.append('des',des);
form_data.append('precio',precio);
form_data.append('admin',admin);
form_data.append('estrato',estrato);
form_data.append('area_',area_);
form_data.append('park_',park_);
form_data.append('cuarto',cuarto);
form_data.append('banos',banos);
form_data.append('searchpublicar',searchpublicar);
form_data.append('lat',lat);
form_data.append('lng',lng);
form_data.append('nombre',nombre);
form_data.append('apellido',apellido);
form_data.append('email',email);
form_data.append('celular',celular);
form_data.append('tel',tel);
form_data.append('soy',soy);
form_data.append('interior',(interior));
form_data.append('exterior',exterior);
form_data.append('extras',extras);
form_data.append('inquilino',inquilino);
form_data.append('seguridad',seguridad);
form_data.append('reglas',reglas);
$.ajax({
url: "publish.php",
type: 'POST',
dataType: 'text',
cache: false,
contentType: false,
processData: false,
data: form_data,
success: function(json){
console.log(json);
var data = JSON.parse(json);
console.log("retorno php de publish : "+data);
var num = parseInt(data.status);
if(num!=0) {
var img_s=0;
var ids= <?php if(isset($_SESSION['id_bizani'])){echo $_SESSION['id_bizani'];}else{echo "0";}?>;
swal({
title: "Publicando Inmueble",
text: "Iniciando carga de imagenes.",
timer: 2000,
showConfirmButton: false,
type: "success"
});
console.log(imgs.length);
for (var i=0; i<imgs.length; i++) {
console.log(i);
var form_data_img = new FormData();
form_data_img.append('id',i);
form_data_img.append('ids',num);
form_data_img.append('file',imgs[i]);
$.ajax({
url: "upload_images.php",
type: 'POST',
dataType: 'text',
cache: false,
contentType: false,
processData: false,
data: form_data_img,
success: function(dat){
var data = JSON.parse(dat);
console.log(data.status);
var num = parseInt(data.status);
if (num==1) {
img_s++;
}
console.log(img_s+imgs.length);
if(img_s==imgs.length){
swal({
title: "Inmueble Publicado",
text: "Tu inmueble estará publicado en las proximas 12 horas.      Hazlo Bizani, Inteligente!   Redireccionando...",
timer: 1500,
showConfirmButton: false,
type: "success"
});
setTimeout(function(){
 location.reload();
},2000);
}
}
});
};
} else {
swal({
title: "Error al publicar el inmueble",
text: "Contactanos para arreglarlo lo antes posible.",
type: "warning"
});
}
}
});
} else {
swal({
title: "Acepta términos y condiciones!",
text: "Estas de acuerdo con los términos.",
type: "warning"
});
};
/*} else {//if y else de quien eres
swal({
title: "Elige quien eres!",
text: "Escoge si eres Inmobiliaria, constructora o particular.",
type: "warning"
});
};*/
} else {
swal({
title: "Ubicación Invalida",
text: "Intenta ubicar mejor tu inmueble",
type: "warning"
});
}
} else {
swal({
title: "Sin Imagen",
text: "Sube al menos una imagen para continuar.",
type: "warning"
});
};
} else {
swal({
title: "Campos Incorrectos",
text: "Completa el formulario con toda la información necesaria y valida.",
type: "warning"
});
};
} else {
login();
}
});


$(".emp").click(function(){
$(".emp").removeClass("activeemp");
$(this).addClass("activeemp");
tipoperson = $(this).data("id");
});
} else {
$("input").click(function(){
login();
});
}

$('#nombre').trigger('keyup');
$('#apellido').trigger('keyup');
$('#email').keyup(); 
$('#celular').keyup(); 
$('#tel').keyup(); 


</script>
</body>
</html>