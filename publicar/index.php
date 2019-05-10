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
.publishbox {padding: 0 12%;} .boxuploadimg {cursor:pointer;position: relative;height: auto;min-height: 90px; background: #fff;box-shadow: 8px 10px 15px 0 rgba(0, 0, 0, 0.2);border-radius: 15px;border: 3px dashed #ffa000;margin-top: 10px;}
.msg_ui {margin-bottom: 25px;text-align: center;top: 25px;position: relative;color: #9E9E9E;font-size: 17px} 
.msg_ui1 {font-size: 15px;}
.boxuploadimg span {font-size: 41px;color: rgba(255, 160, 0, 0.88);float: left;top: -26px;left: 59px;position: relative;}
.boxinput input, .boxinput select, .boxpadd input, .boxpadd select {padding: 12px;padding-right: 30px;border-radius: 5px;border: 1px solid #8BC34A;width: 100%;height: 41px;}
.fullcol {width: 100%; float: left;} .twocol {width: 50%; float: left;}
.row_publish {margin-top: 30px;}
.innerboxinput, .boxpad {padding: 3px;box-sizing: border-box;position: relative;}
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
	.publishbox {padding: 0 2px;}
	.title_pub {padding: 0 10px;font-size: 25px;}
	.titlepub {text-align: center;font-size: 18px;}
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
.glyphicons-remove-sign { color: #c34a4a !important; } 
.glyphicons-ok-sign { color: #8bc34a !important; }
.valid2, .valid3, .valid4, .valid5, .valid6, .valid7, .valid8, .valid9, .valid10, .valid11, .valid12, .valid13, .valid14, .valid15 {display: block;top: 10px;}
.map_mark {position: relative;background: url(http://www.bizani.com/img/mark.png);background-size: cover;background-position: center;width: 50px;height: 50px;left: 0;right: 0;top: -150px;bottom: 0;margin: 0 auto;}
.iconcarac {
	background: url(../images/strip_icons_bizani.jpg);
	background-size: 1000px;
	width: 100px;
	height: 100px;
	margin: 0 auto;
}
.textcarac {}
.nodisplay {/*display: none;*/}

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

.load_img{
	background-position: 40%;
	/*opacity: 0.5;*/
	cursor:pointer;
	background-repeat:no-repeat;
	height: 110px !important;
	width:150px !important;
	display:inline-block;
	/*border: 4px solid #8BC34A;*/
}

.clase_inputfile_js {
    background-color: #fff;
    width: 150px;
    height: 110px;
    position: relative;
    overflow: hidden;
    /* cursor: pointer; */
    background-image: url(img_carac/icon_cam.png);
    background-repeat: no-repeat;
    background-position: center center;
    float: left;
    /*margin: 0px 10px 8px 8px;*/
    outline: 0px;
    border: 1px solid #8BC34A;
    border-radius: 6px;
    /*opacity: 0.6;*/
    margin-top: 7px;
    margin-left: 3px;
}

.cerrar_img{
    width: 15px;
    height: 15px;
    position: relative;
    z-index: 1;
    margin: 4px 130px;
    background-image: url(img/x.png);
    background-repeat: no-repeat;
    border-radius: 50%;
    cursor: pointer;
}

#pps{background-image:url(img_carac/pps.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#cl {background-image:url(img_carac/cl.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#aa {background-image:url(img_carac/aa.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#cj {background-image:url(img_carac/cj.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#gm {background-image:url(img_carac/gm.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#tur{background-image:url(img_carac/tur.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#bbq {background-image:url(img_carac/bbq.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#vm {background-image:url(img_carac/vm.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#pa {background-image:url(img_carac/pa.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#amo {background-image:url(img_carac/amo.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#scam {background-image:url(img_carac/scam.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#ct {background-image:url(img_carac/ct.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#sj {background-image:url(img_carac/sj.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#st {background-image:url(img_carac/st.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#sb {background-image:url(img_carac/sb.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#sau {background-image:url(img_carac/sau.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#jz {background-image:url(img_carac/jz.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#zv {background-image:url(img_carac/zv.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#cf {background-image:url(img_carac/cf.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#vp {background-image:url(img_carac/vp.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#ce {background-image:url(img_carac/ce.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#pd {background-image:url(img_carac/pd.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#pc {background-image:url(img_carac/pc.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#ppor{background-image:url(img_carac/ppor.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#pmm{background-image:url(img_carac/pmm.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#ca {background-image:url(img_carac/ca.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#cs {background-image:url(img_carac/cs.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#ch {background-image:url(img_carac/ch.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#es {background-image:url(img_carac/es.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#halc {background-image:url(img_carac/halc.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#asc {background-image:url(img_carac/asc.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#asp {background-image:url(img_carac/asp.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#ss {background-image:url(img_carac/ss.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#rec {background-image:url(img_carac/rec.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#ala {background-image:url(img_carac/ala.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#vig {background-image:url(img_carac/vig.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#bcom {background-image:url(img_carac/bcom.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#pkp {background-image:url(img_carac/pkp.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#nev {background-image:url(img_carac/nev.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#lav {background-image:url(img_carac/lav.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#micro {background-image:url(img_carac/micro.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#zs {background-image:url(img_carac/zs.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#hom {background-image:url(img_carac/hom.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#muj {background-image:url(img_carac/muj.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#noim {background-image:url(img_carac/noim.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#tud {background-image:url(img_carac/tud.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#pro {background-image:url(img_carac/pro.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#mix {background-image:url(img_carac/mix.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#jov {background-image:url(img_carac/jov.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#may {background-image:url(img_carac/may.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#bp {background-image:url(img_carac/bp.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#perf {background-image:url(img_carac/perf.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#pera {background-image:url(img_carac/pera.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#perp {background-image:url(img_carac/perp.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#pern {background-image:url(img_carac/pern.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#cc {background-image:url(img_carac/cc.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#bcol {background-image:url(img_carac/bcol.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#jd {background-image:url(img_carac/jd.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#lr {background-image:url(img_carac/lr.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#sc {background-image:url(img_carac/sc.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#prr {background-image:url(img_carac/prr.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#jtr {background-image:url(img_carac/jtr.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#oc {background-image:url(img_carac/oc.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#vu {background-image:url(img_carac/vu.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#bcom {background-image:url(img_carac/bcom.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#vml {background-image:url(img_carac/vml.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#vb {background-image:url(img_carac/vb.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}
#tof {background-image:url(img_carac/tof.png);cursor:pointer;background-repeat:no-repeat;height: 72px;width: 82px;}

.cc-selector input{
	border: 1px solid transparent;
    margin:5px;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}

.cc-selector input:hover {
    border: 1px solid #8BC34A;
}

.cc-selector input:checked {
    border: 1px solid #ffa000;
}
.cc-selector input:focus {
     outline: none !important;
}

.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:70px;
    height:70px;
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
			<div class="titlepub">Fotos del Inmueble (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
			<div class="msg_ui">
				<div class="msg_ui1">Arrastra o haz click aquí para subir las fotos del inmueble (hasta un máximo de 20).</div>
				La primera imagen será la imagen de portada.
			</div>
			<div class="boxinput">
				<div class="innerboxinput fullcol cc-selector" id="div_img" >
					<div style="width: 100% !important;" class="clase_inputfile_js" title="Seleccionar archivo desde su PC">
						<input style="width: 100% !important;" class="load_img" type="file" name="files" id="file_1" class="cambia_input_file_js"  multiple="multiple" onchange="ValidarImagen(this);"  title="Seleccionar Foto" style="outline: none; opacity: 0;">
					</div>
				</div>
			</div>
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
					<?php
				
					$use = $conexion->prepare("SELECT * FROM `tipo_publicacion`");
					$use->execute();
					while ($row = $use->fetch(PDO::FETCH_ASSOC)) {
					?>
						<option value="<?=$row["tipu_valor"];?>"><?=$row["tipu_descripcion"];?></option>
					<?php }	?>
				</select>
			</div>
			
			<div class="innerboxinput twocol"><div class="titleinnerboxinput">Tipo de Inmueble </div>
			<select id="tipoinm">

			</select>
		</div>
	</div>
</div>

<div class="row_publish clearfix">
	<div class="titlepub">Título y Descripción (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput">
			<input type="text" placeholder="Título (minimo 5 letras) " id="titulo"><div id="icon_titulo" class="valid validateok valid2"></div>
		</div>
		<div class="innerboxinput">
			<textarea id="des"></textarea><div id="icon_descripcion" class="valid validateok valid2"></div>
			<label for="des" class="transition">Descripción (minimo 11 letras) </label>
		</div>
	</div>
</div>

<div class="row_publish clearfix" style="margin-top:0">
	<div class="titlepub">Especificaciones (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-usd"></i></div>
			<input type="text" class="inputrem" placeholder="Precio" id="precio"><div id="icon_precio" class="valid validateok valid2"></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-old-man prefix"></i></div>
			<input type="text" class="inputrem" placeholder="Gastos de Administración" id="admin"><div id="icon_admin" class="valid validateok valid2"></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-user-asterisk prefix"></i></div>
			<input type="number" class="inputrem" placeholder="Estrato" id="estrato"><div id="icon_estrato" class="valid validateok valid2"></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-vector-path-square prefix"></i></div>
			<input type="number" class="inputrem" placeholder="Área (metros cuadrados)" id="area_"><div id="icon_area" class="valid validateok valid2"></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-car prefix"></i></div>
			<input type="number" class="inputrem" placeholder="Número de Parqueaderos" id="park_"><div id="icon_park" class="valid validateok valid2"></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="cuarto_ glyphicons glyphicons-bed-alt"></i></div>
			<input type="number" class="inputrem" placeholder="Número de Habitaciones" id="cuarto"><div id="icon_cuarto" class="valid validateok valid2"></div>
		</div>
		<div class="innerboxinput twocol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-bath-bathtub prefix"></i></div>
			<input type="number" class="inputrem" placeholder="Número de Baños" id="banos"><div id="icon_banos" class="valid validateok valid2"></div>
		</div>
	</div>
</div>

<div class="row_publish clearfix">
	<div class="titlepub">Ubicación (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-search"></i></div>
			<input type="text" class="inputrem" placeholder="Ejemplo: Avenida Colón # 3 - 40, Cúcuta, Colombia" id="searchpublicar"><div id="icon_searchpublicar" class="valid validateok valid2"></div>
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
	<div class="titlepub" id="titulo_interior">Caracteristicas en el Interior (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol cc-selector" id="carac_interior">

		</div>
	</div>
</div>


<div class="row_publish clearfix">
	<div class="titlepub" id="titulo_exterior">Caracteristicas en el Exterior (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol cc-selector" id="carac_exterior">

		</div>
	</div>
</div>

<div class="row_publish clearfix">
	<div class="titlepub" id="titulo_extras">Caracteristicas en el Extras (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol cc-selector" id="carac_extras">

		</div>
	</div>
</div>

<div class="row_publish clearfix">
	<div class="titlepub" id="titulo_seguridad">Caracteristicas de Seguridad (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol cc-selector" id="carac_seguridad">

		</div>
	</div>
</div>

<div class="row_publish clearfix">
	<div class="titlepub" id="titulo_inquilino">Tipo de Inquilino (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol cc-selector" id="carac_inquilino">
		
		</div>
	</div>
</div>

<div class="row_publish clearfix">
	<div class="titlepub" id="titulo_reglas">Reglas del Inmueble (<span style="margin-top: -4px;" class="glyphicons glyphicon-asterisk"></span>)</div>
	<div class="boxinput">
		<div class="innerboxinput fullcol cc-selector" id="carac_reglas">

		</div>
	</div>
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
				<input type="text" class="inputrem" placeholder="Nombres" id="nombre" value="<?=$array[0]." ".$array[1]?>">
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="Nombres" id="nombre" >
			<?php } ?>	

		<div id="icon_nombre" class="valid validateok valid2"></div>
		</div>
		
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-user"></i></div>
			
			<?php if (isset($_SESSION["lastname_bizani"])){ ?>
				<input type="text" class="inputrem" placeholder="Apellidos" id="apellido" value="<?=$array[2]." ".$array[3]?>">
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="Apellidos" id="apellido">
			<?php } ?>	
			
			<div id="icon_apellido" class="valid validateok valid2"></div>
		</div>
		
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-envelope"></i></div>
			<?php if (isset($_SESSION["email_bizani"])){ ?>
				<input type="text" class="inputrem" placeholder="E-mail" id="email" value="<?=$_SESSION["email_bizani"]?>">
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="E-mail" id="email">
			<?php } ?>	

			<div id="icon_email" class="valid validateok valid2"></div>
		</div>
		
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-earphone"></i></div>
			
			<?php if (isset($_SESSION["cel_bizani"])){ ?>
				<input type="text" class="inputrem" placeholder="Celular" id="celular" value="<?=$_SESSION["cel_bizani"]?>">
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="Celular" id="celular">
			<?php } ?>
			<div id="icon_celular" class="valid validateok valid2"></div>
		</div>
		
		<div class="innerboxinput fullcol">
			<div class="iconboxinput"><i class="glyphicons glyphicons-phone-alt"></i></div>
			
			<?php if (isset($_SESSION["tel_bizani"])){ ?>
				<input type="text" class="inputrem" placeholder="Télefono Fijo (opcional)" id="tel" value="<?=$_SESSION["tel_bizani"]?>">
			<?php }else{ ?>
				<input type="text" class="inputrem" placeholder="Télefono Fijo (opcional)" id="tel">
			<?php } ?>	
			<div id="icon_telefono" class="valid validateok valid2"></div>
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
		<div class="a_c"> 
			<div class="checka_c"><input type="checkbox" id="check_terminos"> </div>
			<div class="texta_c">He leído, entendido y acepto los <a href="terminos.php" target="_blank">términos</a>,<a href="terminos.php" target="_blank">condiciones</a> y reconocer la <a href="terminos.php" target="_blank"> política de confidencialidad</a>.</div>
		</div>
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

$("#precio").keypress(function(tecla){
	if(tecla.charCode < 48 || tecla.charCode > 57){ return false};
	$(this).val(format($(this).val()));
});

$("#admin").keypress(function(tecla){
	if(tecla.charCode < 48 || tecla.charCode > 57){ return false};
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

function cargar_tipo_inmueble(tipo_pub){
    $.get("tipo_inmueble.php", {tipo_pub:tipo_pub}, function(data){
		var response = jQuery.parseJSON(data);
		//console.log(data.id.length);
		console.log(response.id.length);
	   if(response.id.length>0){
        	console.log(response.id.length);
        	 $("#tipoinm").html("");
	        for(var i = 0;i<response.tiin_valor.length;i++){
	            $("#tipoinm").append('<option value="'+response.tiin_valor[i]+'">'+response.tiin_descripcion[i]+'</option>');
	        }
        }else{
       		alert("Este tipo de publicación, no tiene ningun tipo de inmueble!.");
    	}
    });
  
}

function cargar_carac(cat){
    $.get("caracteristicas.php", {cat:cat}, function(data){
		var response = jQuery.parseJSON(data);
		//console.log(data.id.length);
		console.log(response.id.length);
	   if(response.id.length>0){
        	console.log(response.id.length);
        	$("#carac_"+cat).html("");
    		$("#titulo_"+cat).slideDown(0);
	        for(var i = 0;i<response.id.length;i++){
	            $("#carac_"+cat).append('<input onclick="click_'+response.cat[i]+'();" class="'+response.cat[i]+'" id="'+response.name[i]+'" type="checkbox" name="'+response.name[i]+'" value="'+response.name[i]+'">');
	        }
        }else{
       		alert("Este tipo de publicación, no tiene ningun caracteristica de tipo "+cat);
    	}
    });
  
}

cargar_tipo_inmueble("arriendo"); 
cargar_carac("interior");
cargar_carac("exterior");
cargar_carac("seguridad");
cargar_carac("extras");
cargar_carac("inquilino");

$("#inmpublish").change(function(){
	
	$("#titulo_interior").slideUp(0);
	$("#titulo_exterior").slideUp(0);
	$("#titulo_reglas").slideUp(0);
	$("#titulo_seguridad").slideUp(0);
	$("#titulo_extras").slideUp(0);
	$("#titulo_inquilino").slideUp(0);
	
	$("#carac_interior").html("");
	$("#carac_exterior").html("");
	$("#carac_seguridad").html("");
	$("#carac_reglas").html("");
	$("#carac_extras").html("");
	$("#carac_inquilino").html("");
	
	var tipo_publi=$(this).val();
	cargar_tipo_inmueble(tipo_publi);
	if(tipo_publi=='arriendo_habitacion' || tipo_publi=='alquiler_vacacional' ){
		cargar_carac("interior");
		cargar_carac("exterior");
		cargar_carac("seguridad");
		cargar_carac("extras");
		cargar_carac("inquilino");
		cargar_carac("reglas");
	}else{
		if(tipo_publi=='arriendo'){
			cargar_carac("interior");
			cargar_carac("exterior");
			cargar_carac("seguridad");
			cargar_carac("extras");
			cargar_carac("inquilino");
		}else{
			cargar_carac("interior");
			cargar_carac("exterior");
			cargar_carac("seguridad");
			cargar_carac("extras");
		}
	}
});

var array_images=[];
var array_removes=[];

//validar imagen
function ValidarImagen(obj){
    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
        document.getElementById("txtFoto").value = null;
        return;
    }

    if (!(/\.(jpg|png)$/i).test(uploadFile.name)) {
        alert('Error, El archivo a adjuntar no es una imagen valida');
      //  document.getElementById("txtFoto").value = null;
    }
    else {
        var img = new Image();
        img.onload = function (){
          if(((array_images.length)-array_removes.length)<11){
	            /*if (uploadFile.size > 1110000){
	                alert("Error, El Peso De La Imagen No Puede Superar Los 1 Mb");
	            }
	            else{*/
	            	var files = document.getElementById('file_1').files;
			        for(var i = 0; i < files.length; i++){
			            if(array_images.length<11){
				            resize(files[i]);
			            }
			        }
	           //}
          }else{ alert("Error!, Ya haz Cargado un Total de 10 Imagenes.");}
        };
        img.src = URL.createObjectURL(uploadFile);
    }                 
}

function resize(file) {
    var reader = new FileReader();
    reader.onloadend = function() {
 
    var tempImg = new Image();
    tempImg.src = reader.result;
    tempImg.onload = function(){
 
        var MAX_WIDTH = 800;
        var MAX_HEIGHT = 800;
        var tempW = tempImg.width;
        var tempH = tempImg.height;
        if (tempW > tempH) {
            if (tempW > MAX_WIDTH) {
               tempH *= MAX_WIDTH / tempW;
               tempW = MAX_WIDTH;
            }
        } else {
            if (tempH > MAX_HEIGHT) {
               tempW *= MAX_HEIGHT / tempH;
               tempH = MAX_HEIGHT;
            }
        }
 
        var canvas = document.createElement('canvas');
        canvas.width = tempW;
        canvas.height = tempH;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(this, 0, 0, tempW, tempH);
        var dataURL = canvas.toDataURL("image/jpeg");
        if(array_images.length<11){
        	var data=array_images.length;
        	array_images.push(dataURL);
   //     	var name = ""+data+"";
			// array_images[name] = dataURL;
        	$("#div_img").append('<div  id="div_file_'+data+'" class="" data-id='+data+'><div  class="clase_inputfile_js div_file" style="background-size:cover;background-image:url('+dataURL+')"><div class="cerrar_img" onclick="remove_img('+data+')"></div></div></div>');
        }
      }
 
   }
   reader.readAsDataURL(file);
}

function save_images(id){
    //alert(array_images.length);
    for(var i = 0; i < array_images.length; i++) {
       if($.inArray( i, array_removes )<0){//para no cargar las imagenes q estan en el array de borrados!
	        var xhr = new XMLHttpRequest();
	        xhr.onreadystatechange = function(ev){
	           //alert( 'Done!');
	        };
	    
	        xhr.open('POST', 'uploadResized.php?id='+id, true);
	        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	        var data = 'image=' + array_images[i];
	        xhr.send(data);
       }
    }
}

function remove_img(t) {
	$("#div_file_"+t).remove();
	
	array_removes.push(t);
	for(var i = 0; i < array_removes.length; i++) {
		console.log("posicion: "+i +"valor : "+array_removes[i]);

	}
}
c_interior="";
function click_interior(){
	c_interior="";
	$(".interior:checkbox:checked ").each(function() {
	     c_interior+=$(this).val()+",";
    });

   c_interior=c_interior.substring(0, c_interior.length-1);
}


var c_exterior="";
function click_exterior(){
	c_exterior="";
	$(".exterior:checkbox:checked ").each(function() {
	     c_exterior+=$(this).val()+",";
    });

   c_exterior=c_exterior.substring(0, c_exterior.length-1);
}

var c_extras="";
function click_extras(){
	c_extras="";
	$(".extras:checkbox:checked ").each(function() {
	     c_extras+=$(this).val()+",";
    });

   c_extras=c_extras.substring(0, c_extras.length-1);
}

var c_seguridad="";
function click_seguridad(){
	c_seguridad="";
	$(".seguridad:checkbox:checked ").each(function() {
	     c_seguridad+=$(this).val()+",";
    });

   c_seguridad=c_seguridad.substring(0, c_seguridad.length-1);
}

var c_inquilino="";
function click_inquilino(){
	c_inquilino="";
	$(".inquilino:checkbox:checked ").each(function() {
	     c_inquilino+=$(this).val()+",";
    });

   c_inquilino=c_inquilino.substring(0, c_inquilino.length-1);
}

var c_reglas="";
function click_reglas(){
	c_reglas="";
	$(".reglas:checkbox:checked ").each(function() {
	     c_reglas+=$(this).val()+",";
    });

   c_reglas=c_reglas.substring(0, c_reglas.length-1);
}

$("input").each(
	function(index, value) {
	//	$(this).change(validar_campos);
		$(this).keypress(validar_campos);
		$(this).keyup(validar_campos);
		$(this).keydown(validar_campos);
	}
);

$("textarea").each(
	function(index, value) {
		$(this).change(validar_campos);
		$(this).keypress(validar_campos);
		$(this).keyup(validar_campos);
		$(this).keydown(validar_campos);
	}
);

 
function validar_campos(){
	$("#icon_titulo").html("");
	$("#icon_descripcion").html("");
	$("#icon_precio").html("");
	$("#icon_admin").html("");
	$("#icon_estrato").html("");
	$("#icon_area").html("");
	$("#icon_park").html("");
	$("#icon_cuarto").html("");
	$("#icon_banos").html("");
	$("#icon_searchpublicar").html("");
	$("#icon_nombre").html("");
	$("#icon_apellido").html("");
	$("#icon_email").html("");
	$("#icon_celular").html("");
	$("#icon_telefono").html("");
	
	if($("#titulo").val().length<5){$("#icon_titulo").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_titulo").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#des").val().length<11){$("#icon_descripcion").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_descripcion").html('<span class="glyphicons glyphicons-ok-sign"></span>');}

	if($("#precio").val().length<5){$("#icon_precio").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_precio").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#admin").val().length<4){$("#icon_admin").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_admin").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#estrato").val().length<1){$("#icon_estrato").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_estrato").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#area_").val().length<1){$("#icon_area").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_area").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#park_").val().length<1){$("#icon_park").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_park").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#cuarto").val().length<1){$("#icon_cuarto").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_cuarto").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#banos").val().length<1){$("#icon_banos").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_banos").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#searchpublicar").val().length<1){$("#icon_searchpublicar").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_searchpublicar").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#nombre").val().length<1){$("#icon_nombre").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_nombre").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#apellido").val().length<1){$("#icon_apellido").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_apellido").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#email").val().length<1){$("#icon_email").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_email").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#celular").val().length<1){$("#icon_celular").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_celular").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
	
	if($("#tel").val().length<1){$("#icon_telefono").html('<span class="glyphicons glyphicons-remove-sign"></span>');
	}else{$("#icon_telefono").html('<span class="glyphicons glyphicons-ok-sign"></span>');}
}


$(".publicar_").click(function(){
	if(((array_images.length)-array_removes.length)<1){
		swal({
			title: "Error de Imagenes.",
			text: "Inserte al menos una imagen.",
			type: "warning"
		});
		return false;
	}
	if($("#titulo").val().length<5){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese un valor para el Titulo del Inmueble.",
			type: "warning"
		});
		return false;
	}
	if($("#des").val().length<11){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese un valor para la descripción del Inmueble.",
			type: "warning"
		});
		return false;
	}

	if($("#precio").val().length<5){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese un valor valido para el precio del Inmueble.",
			type: "warning"
		});
		return false;
	}
	if($("#admin").val().length<4){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese un valor valido para la administración del Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if($("#estrato").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese un valor para el estrato del Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if($("#area_").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese un valor para el área del Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if($("#park_").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese un valor para el número de parqueaderos del Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	
	if($("#cuarto").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese un valor para el número de habitaciones del Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	
	if($("#banos").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese un valor para el número de baños del Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if($("#searchpublicar").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Seleccione una ubicacion en el mapa para el Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if($("#nombre").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese el nombre de contacto para el Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if($("#apellido").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese el apellido de contacto para el Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if($("#email").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese el email de contacto para el Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if($("#celular").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese el celular de contacto para el Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if($("#tel").val().length<1){
		swal({
			title: "Campos Incorrectos",
			text: "Ingrese el télefono de contacto para el Inmueble.",
			type: "warning"
		});
		return false;
	}
	
	if(!$('#check_terminos').prop('checked') ) {
		swal({
			title: "Acepta Términos y Condiciones.",
			text: "Lee los Términos y Condiciones de Nuestro Sitio Web.",
			type: "warning"
		});
		return false;
	}
	
	var link = $("#youtube").val();
	var inmpublish = $("#inmpublish").val();
	var tipoinm = $("#tipoinm").val();
	var titulo = $("#titulo").val();
	var descripcion = $("#des").val();
	var precio = $("#precio").val().replace("$","").replace(/,/g,"");
	var admin = $("#admin").val().replace("$","").replace(/,/g,"");
	var estrato = $("#estrato").val();
	var area = $("#area_").val();
	var park = $("#park_").val();
	var cuarto = $("#cuarto").val();
	var banos = $("#banos").val();
	var direccion_mapa = $("#searchpublicar").val();
	var lat = $("#lat").val();
	var lng = $("#lng").val();
	var nombre = $("#nombre").val();
	var apellido = $("#apellido").val();
	var email = $("#email").val();
	var celular = $("#celular").val();
	if($("#tel").val()!=""){var tel = $("#tel").val();}else{var tel=0;}

	console.log(" youtube :"+link+"\n");
	console.log(" inmpublish :"+inmpublish+"\n");
	console.log(" tipoinm :"+tipoinm+"\n");
	console.log(" titulo :"+titulo+"\n");
	console.log(" descripcion :"+descripcion+"\n");
	console.log(" precio :"+precio+"\n");
	console.log(" admin :"+admin+"\n");
	console.log(" estrato :"+estrato+"\n");
	console.log(" area :"+area+"\n");
	console.log(" park :"+park+"\n");
	console.log(" cuarto :"+cuarto+"\n");
	console.log(" banos :"+banos+"\n");
	console.log(" direccion_mapa :"+direccion_mapa+"\n");
	console.log(" lat :"+lat+"\n");
	console.log(" lng :"+lng+"\n");
	console.log(" nombre :"+nombre+"\n");
	console.log(" apellido :"+apellido+"\n");
	console.log(" email :"+email+"\n");
	console.log(" celular :"+celular+"\n");
	console.log(" tel :"+tel+"\n");
	//console.log(" id :"+id+"\n");
	console.log(" c_interior:"+c_interior+"\n");
	console.log(" c_exterior :"+c_exterior+"\n");
	console.log(" c_seguridad :"+c_seguridad+"\n");
	console.log(" c_extras :"+c_extras+"\n");
	console.log(" c_inquilino :"+c_inquilino+"\n");
	console.log(" c_reglas :"+c_reglas+"\n");

	var form_data = new FormData();
	//form_data.append('id',id);
	form_data.append('link',link);
	form_data.append('inmpublish',inmpublish);
	form_data.append('tipoinm',tipoinm);
	form_data.append('titulo',titulo);
	form_data.append('des',descripcion);
	form_data.append('precio',precio);
	form_data.append('admin',admin);
	form_data.append('estrato',estrato);
	form_data.append('area',area);
	form_data.append('park',park);
	form_data.append('cuarto',cuarto);
	form_data.append('banos',banos);
	form_data.append('searchpublicar',direccion_mapa);
	form_data.append('lat',lat);
	form_data.append('lng',lng);
	form_data.append('nombre',nombre);
	form_data.append('apellido',apellido);
	form_data.append('email',email);
	form_data.append('celular',celular);
	form_data.append('tel',tel);
	form_data.append('interior',c_interior);
	form_data.append('exterior',c_exterior);
	form_data.append('extras',c_extras);
	form_data.append('inquilino',c_inquilino);
	form_data.append('seguridad',c_seguridad);
	form_data.append('reglas',c_reglas);
	
	var id_folder="";	
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        
        if (this.readyState == 4 && this.status == 200) {
        	console.log("id respuesta del ajax " +this.responseText);
        	if(this.responseText >1){
        		id_folder=this.responseText;
        		save_images(id_folder);
            	swal({
					title: "Inmueble Registrado con Exito",
					text: "Iniciando carga de imagenes.",
					timer: 2000,
					showConfirmButton: false,
					type: "success"
				});
  		    }
  		    else{
  		  	  alert("Error, No Se Realizo el Registro, Usuario o Correo Ya Se Encuentran Registrados");
  		      //document.getElementById('btnRegistrar').disabled=false;
  		    }
        }
    };
    xmlhttp.open("POST","publish.php", true);
    xmlhttp.send(form_data);   	

});//cierre de publicar
</script>

</body>
</html>