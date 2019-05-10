<?php
session_start();
//error_reporting(E_ALL ^ E_NOTICE);
require_once("../web_control/functions.php");
require_once("../web_control/db.php");
require_once("../web_control/vars.php");
$conexion = new Conexion();
$type_nav = 2;
$title = "Términos Y Condiciones | Plataforma Inmobiliaria";
?>
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
.msg_ui {
    margin-bottom: 25px;
    /* text-align: center; */
    top: 25px;
    position: relative;
    /* color: #9E9E9E; */
    /* font-size: 17px; */	
} 
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
		<div class="title_pub"><span></span> Términos y Condiciones de Uso.</div>
		<div class="publishbox">
				<div class="msg_ui">
					Términos y Condiciones | Políticas de Privacidad
					<br><br>
					El uso de esta página web, aplicación web y móvil, y sus usuarios se regirán por los siguientes términos y políticas de privacidad, los que se tendrán por aceptados tácitamente sin que pueda entenderse o presumirse condicionamiento alguno al ingresar o utilizar los servicios ofrecidos en este portal, advirtiéndose que los mismos estarán sujetos a cambios en cualquier momento por el operador del portal, resultando imperioso para el usuario estar informado y actualizado de la reglamentación, puesto que las modificaciones o actualizaciones se entenderán comunicadas a los usuarios y aceptadas por los mismos al momento en que sean publicadas en este portal y/o aplicación web y móvil.<br><br>
					<br><br>
					OBJETO DE LA PÁGINA WEB 
					<br><br>
					Se pone de presente que la única actividad desarrollada o efectuada mediante BIZANI.COM  son las publicaciones de 1) inmuebles de vivienda urbana que se encuentran en arriendo y/o en venta, 2) habitaciones de casa y apartamentos que se encuentran en arrendamiento, 3) locales comerciales (negocios) que están en arriendo y/o en venta y 4) habitaciones de hostales y hoteles en las diferentes ciudades de Colombia, en virtud a lo anterior, se precisa que el operador de este portal en ningún momento actúa ni actuará en calidad de vendedor ni arrendador como tampoco asegurará o certificará las condiciones de las propiedades ofrecidas, pues la web solamente sirve de medio para enunciar las ofertas de venta y arriendo que tienen sus respectivos usuarios. Tampoco, tendrá responsabilidad alguna sobre las irregularidades e inconvenientes que resulten de los contratos de arrendamiento y de venta con los productos publicados, ya que el portal web no tiene la calidad de intermediario entre las partes de dichos contratos.<br><br>
					Se advierte que BIZANI S.A.S. no ejecuta investigación alguna sobre la titularización del dominio de los productos que se publican en este portal para venderlos o arrendarlos. Sin embargo, la información y las imágenes usadas por el usuario oferente y receptor al momento de crear su perfil y la descripción e inscripción de los bienes, estarán sujetas a revisión, para determinar por lo menos la existencia del bien, hoteles, hostales y los antecedentes judiciales de los usuarios oferentes.<br><br>
					<br><br><br>
					CONCEPTOS 
					<br><br>
					Para la presente reglamentación y todos los efectos legales, los usuarios de bizani.com deberán tener en cuenta la siguiente clasificación y conceptualización, ya que en virtud a ello, se desarrollaran la prestación del servicio de publicación, las restricciones y usos permitidos para cada tipo de usuario.<br><br>
					USUARIO OFERENTE:
					<br>
					Es el único usuario que puede realizar  publicaciones en el portal  y/o aplicación web o móvil, para lo cual deberá (i) realizar un primer registro para la creación de su perfil ya sea de forma directa en la página web o  aplicación  mediante el espacio de “iniciar sesión - regístrate” o  en el fan page de Facebook Bizani   (ii) un segundo registro para la inscripción y descripción de los productos (inmuebles, habitaciones, locales comerciales, hoteles y hostales) que pretende anunciar en la web, y (iii) el pago inmediato de una suma de dinero a favor de Bizani S.A.S. mediante alguno de los medios de pago que dispone la misma plataforma, en donde el valor del pago dependerá del tipo de publicación. <br><br>  
					
					Tal usuario, tendrá la facultad de compartir cualquier publicación que se encuentre en este portal, renovar y eliminar las publicaciones que realice, bajo las reglas y  limitaciones de derechos de autor y de propiedad industrial señaladas en el acápite respectivo. Además, podrá comunicarse de un lado, con los otros usuarios interesados en sus inmuebles mediante el chat que se habilita con su registro, y de otro lado, con  el operador del portal a través del icono “Déjanos un comentario”. Advirtiéndose en todo caso, que el contenido de la información compartida en el chat no será responsabilidad de BIZANI S.A.S  ni del portal.<br><br>
					Igualmente, el usuario oferente recibirá por parte del operador del portal en los iconos “Alertas” – “Mensaje de Bizani” notificaciones en donde se le informará a cuáles y cuántos usuarios les gusta o están interesados en sus inmuebles publicados y demás información que resulte necesaria e importante para el usuario, como los concursos que se realizan. <br><br>
					<br>
					USUARIO RECEPTOR:
					<br>
					Aquel usuario quien tiene un único registro para la creación de su perfil ya sea de forma directa en la página web o  aplicación  mediante el espacio de “iniciar sesión - regístrate” o  en el fan page de Facebook Bizani, a través del cual podrá observar sin limitación alguna las publicaciones que realiza el usuario oferente, buscar inmuebles, habitaciones, hoteles, hostales y locales comerciales (negocios) en arriendo y/o en venta, seleccionar como lista de favoritos las publicaciones que más le interesen, las cuales quedarán guardadas en su respectivo perfil y finalmente compartir las publicaciones que se encuentren en este portal, estando sujeto a las reglas y limitaciones de derechos de autor y de propiedad industrial señaladas en el acápite respectivo. Además, podrá comunicarse de un lado, con los usuarios oferentes mediante el chat que se habilita con su registro, y de otro lado, con  el operador del portal a través del icono “Déjanos un comentario”. Advirtiéndose en todo caso, que el contenido de la información compartida en el chat  no será responsabilidad de BIZANI S.A.S  ni del portal. Sin embargo, no podrá ofrecer sus bienes o realizar publicaciones en este medio.<br><br>
					Igualmente, el usuario receptor recibirá por parte del operador del portal en los iconos “Alertas” – “Mensaje de Bizani” notificaciones en donde se le suministrará toda la información que resulte necesaria e importante para el usuario, como los concursos que se realizan. <br><br>
					<br>
					USUARIO ANÓNIMO:
					<br>
					Persona que utiliza, visita y navega en el portal web  y/o la aplicación web o móvil en búsqueda de inmuebles, habitaciones y locales comerciales (negocios) en arriendo y/o en venta sin necesidad de realizar un registro, por lo que no podrá ofrecer sus bienes o realizar publicaciones en este medio, únicamente tendrá la facultad de compartir de manera íntegra las publicaciones de los usuarios oferentes,  atendiendo las reglas y limitaciones de derechos de autor y de propiedad industrial señaladas en el acápite respectivo.<br><br>
					<br><br><br>
					EL REGISTRO EN LA PÁGINA WEB Y/O APLICACIÓN WEB O MÓVIL Y DE LOS PRODUCTOS A PUBLICAR
					<br><br>
					Los usuarios oferentes y receptores deberán registrarse para la creación de su perfil ya sea de forma directa en la página web o  aplicación  mediante el espacio de “iniciar sesión - regístrate” o  en el fan page de Facebook Bizani, diligenciando la totalidad de la información básica que allí le es requerida. Además, el usuario oferente quien pretenda publicar, realizará un segundo registro para la inscripción y descripción de los productos que va a enunciar, aportando datos adicionales y adjuntando las imágenes solicitadas en la forma que se requieren, con el fin de que sea contactado por los usuarios receptores o anónimos. Las fotografías aportadas por el usuario estarán sujetas a revisión y a las condiciones establecidas en el acápite de DERECHOS DE AUTOR Y PROPIEDAD INDUSTRIAL al igual que la información dada para el perfil, inscripción y descripción de los bienes, para determinar por lo menos la existencia del bien y los antecedentes judiciales de los usuarios oferentes y receptores, sin que ello implique responsabilidad alguna de BIZANI S.A.S ni del operador del portal, pues se itera, que estos no son intermediarios ni parte de los contratos de arrendamiento y compraventa que se efectúen con los inmuebles publicados.<br><br>
					El usuario anónimo no tendrá que hacer registro alguno, en virtud a las actividades que puede realizar en la web y las limitaciones que a su vez detenta.
					
					BONO DE COMPRA con el registro del usuario en la página web o  aplicación  mediante el espacio de “iniciar sesión - regístrate” o  en el fan page de Facebook Bizani, se le otorgará por una única vez a dicho usuario un bono por un valor de veinte mil pesos colombianos ($20.000), el cual podrá ser usado para pagar las publicaciones que el mismo realice en el portal de BIZANI, por lo tanto, dicho monto no es redimible por dinero ni otro bien. <br><br>
					
					<br><br>
					TIPOS DE PUBLICACIÓN<br><br>
					
					
					1.	Publicación por el término de 30 días, la cual se ubicará entre las publicaciones normales, es decir, no estará destacada, y tiene un costo de  veinte mil pesos colombianos ($20.000). <br><br>
					
					2.	Publicación por el término de 60 días, la cual se ubicará entre las publicaciones destacadas, atendiendo las características del bien publicado y las que requiere la persona que desea arrendar o comprar el bien divulgado y tiene un costo de treinta mil pesos colombianos ($30.000)<br><br>
					
					3.	Publicación por el término de 90 días, la cual se ubicará entre las publicaciones destacadas, atendiendo las características del bien publicado y las que requiere la persona que desea arrendar o comprar el bien divulgado y tiene un costo de cuarenta mil pesos colombianos ($40.000)<br><br>
					
					El bono que otorga BIZANI a las personas que se registren en la página web o  aplicación  mediante el espacio de “iniciar sesión - regístrate” o  en el fan page de Facebook Bizani, puede ser utilizado como parte de pago de cualquiera de los tipos de publicación atrás mencionados.<br><br>  
					<br><br>
					FINALIZACIÓN, RENOVACIÓN, CANCELACIÓN Y ELIMINACIÓN DE LA PUBLICACIÓN
					<br><br>
					La publicación finalizará una vez culmine el término de la misma, para el efecto, el portal mediante notificaciones las cuales se reciben en los iconos “Alertas” – “Mensaje de Bizani” informará al usuario oferente que su publicación terminará y en consecuencia será cancelada por expiración del término.  No obstante, desde el registro del bien, en el  panel del perfil del usuario se indicará el día en que caducará la publicación. El usuario podrá realizar la renovación de la publicación dentro de los 4 días anteriores a la fecha en la que venza el término de la misma, mediante la página web o en la aplicación web o móvil, dando click en el espacio “renovar” y pagando la tarifa respectiva del tipo de publicación que desee, llegado el día sin que el usuario haya realizado el procedimiento mencionado, esta no será renovada.<br><br>
					En caso de que el inmueble ofertado por el usuario sea arrendado o vendido antes del vencimiento de la publicación o el usuario pretenda eliminarla del portal antes de que caduque la misma, este tendrá la obligación de borrarla del portal a través de su perfil en el espacio “mis inmuebles” sin derecho a reembolso total ni parcial de lo consignado por el usuario.<br><br>
					Cuando el usuario oferente no dé cumplimiento al requerimiento que se le haga para que corrija la información para la creación del perfil, la inscripción y descripción de los bienes, dentro del término que se le otorgue, la publicación no se hará y el usuario no tendrá derecho a reembolso total ni parcial del monto consignado para la divulgación.<br><br>
					<br><br>
					DERECHOS DE AUTOR Y PROPIEDAD INDUSTRIAL
					<br><br>
					El software, los contenidos, la información, los signos distintivos y todo el material del sitio web  pertenecen a BIZANI S.A.S. y están protegidos por el derecho marcario y de autor, conforme a las normas de la Comunidad Andina en su Decisión 486 del 2000 y en la  legislación de Colombia. Se prohíbe de manera indiscutible el uso de cualquier material del sitio web en cualquier otra página, red o  portal web.<br><br>
					Los usuarios oferentes, se obligan a adjuntar exclusivamente imágenes que sean de su autoría, responsabilizándose de forma total frente a los terceros o demás usuarios a los cuales se les infrinja sus derechos de autor. El portal web y su operador se eximen de toda la responsabilidad que pueda ocasionarse por la autoría o infracción de derechos de las imágenes aportadas por aquellos. No obstante, cada una de las imágenes que se pretendan publicar por el usuario estarán sujetas a revisión atendiendo los datos ingresados y la claridad de los mismos, advirtiéndose que al aportarse fotografías no permitidas tales como: aquellas que no correspondan a inmuebles o bienes sujetos a la prestación del servicio inmobiliario, traten de publicidad, sean indecorosas, atenten contra la moral social,  imágenes de  inmuebles que ya se encuentran publicados en la web y se pretenda nuevamente su divulgación con información diferente a la que se aportó con la primera publicación o imágenes allegadas a través de link de otras páginas web, se requerirá al usuario mediante notificaciones las cuales se reciben en los iconos “Alertas” – “Mensaje de Bizani”, a fin de que corrija y/o cambie las mismas. En caso de reincidencia el usuario será eliminado y perderá el derecho de publicación.<br><br>
					Cualquier infracción de los signos distintivos u obras de propiedad del operador del portal y de BIZANI S.A.S, dará derecho a interponer las acciones legales respectivas, salvo que se trate de reproducir o de compartir mediante redes sociales y de manera íntegra la publicación de la presente página web con fines informativos respecto al bien que se encuentra ofertando el usuario u otros bienes ofrecidos por otros usuarios de la web.  No habrá oportunidad a que el usuario utilice las imágenes modificadas por este operador y que hayan sido publicadas bajo una marca de agua con la denominación del portal.<br><br>
					El usuario receptor, se obliga a realizar la reproducción o compartir las ofertas publicadas en esta página web de una forma íntegra, sin que pueda desconocerse el origen de la publicación. Cualquier alteración de las mismas o su uso comercial constituirá infracciones a los derechos de autor de los signos distintivos de propiedad del operador, en lo correspondiente se aplicaran las normas y prohibiciones de los usuarios registrados frente a los derechos de autor.<br><br>
					Se tendrá como infracciones del usuario anónimo, todas las reproducciones de las publicaciones de la página web cuando conlleve cualquiera de las siguientes actuaciones: fines comerciales desconociendo el origen de la publicación y/o alterando las mismas o las marcas de agua impuestas en las  imágenes.<br><br>
					<br><br>
					LICENCIA DE USO GRATUITO
					<br><br>El usuario mediante su registro a la página web, autoriza por licencia de uso gratuito con vencimiento indeterminado el uso, exhibición y la fijación en la página web, aplicación web y móvil las fotografías de los inmuebles que adjunte para la publicación, así mismo, las modificaciones de las imágenes con la finalidad de adaptar su tamaño y la calidad de las mismas cuando sea necesario, además, que se utilicen las imágenes modificadas con fines de publicidad para el sitio web en cualquier medio de comunicación visual, sin que los actos anteriores implique infracción a los derechos de autor del usuario. El usuario no podrá reproducir o fijar en algún soporte las fotografías  modificadas por el operador de la página web.<br><br>
					OBLIGACIONES DE LOS USUARIOS<br><br>
					Además de cada una de las obligaciones que se han establecido en los acápites anteriores, los usuarios oferentes, receptores  y anónimos, dependiendo a las actividades que pueden realizar en este portal, se obligan con el operador del sitio web a lo siguiente:<br><br>
					•	A otorgar información real, correcta y fidedigna al  momento de hacer el registro para crear el perfil  (información personal) y hacer la inscripción y descripción de los bienes que va a publicar.<br><br>
					•	A corregir la información que se le requiera dentro del término que se le otorgue, so pena de que la publicación no se realice.<br><br>
					•	A realizar el pago de la publicación. <br><br>
					•	A renovar la publicación antes de que venza el término de la misma, so pena de que se cancele por la expiración del término de la publicación.<br><br>
					•	A utilizar en debida forma los signos distintivos que se advierten en este portal atendiendo que son de propiedad del operador y este tiene derechos marcarios y de autor sobre los mismos.<br><br>
					•	A usar de manera adecuada el sitio web, aplicación web y móvil, conforme al servicio de publicación que se prestan.<br><br>
					•	A realizar la eliminación de la publicación cuando el bien ya no sea ofertado por haber sido objeto de arriendo o de venta.<br><br>
					•	A no difundir la información de bizani.com que obtenga en calidad de usuario oferente y que no sea de público conocimiento para los demás usuarios, a fin de proteger las políticas de funcionamiento y de marketing de la web y del operador.<br><br>
					•	A mantener un diálogo respetuoso y tolerante al momento de comunicarse con los otros usuarios mediante el chat y con el operador del portal cuando deje mensajes en el icono “Déjanos un comentario”.<br><br>
					TRATAMIENTO y PROTECCIÓN DE DATOS PERSONALES<br><br>
					Mediante la creación de perfiles, inscripciones de bienes y la opción de ponerse en contacto con el vendedor y/o arrendador a través del chat de la página web, aplicación web o móvil, el operador recopilará información de los usuarios, a los cuales se les dará el tratamiento establecido en la Ley 1581 de 2012, demás normas que sean procedentes y las reglas que a continuación se describen, las cuales se entienden aceptadas bajo un consentimiento expreso e informado al momento en el que los usuarios oferentes y receptores creen el perfil en la página web, aplicación web y móvil, y el usuario anónimo se coloque en contacto mediante el chat, información que será autorizada por los usuarios para que el operador pueda generar una base de datos.<br><br>
					BIZANI S.A.S. como operador del sitio web y aplicativo web y móvil interesado en velar por la privacidad e integridad de sus usuarios se compromete a i) solicitar únicamente los datos que sean necesarios para la publicación respectiva, entre ellos, los datos obligatorios del usuario oferente para que pueda ser contactado por los interesados en los bienes publicados, los que describan los inmuebles y la ubicación de los mismos, pues se itera, que el operador de la página web, la aplicación web y móvil ni la misma plataforma no son intermediarios y debe existir comunicación directa entre arrendador y arrendatario, así como entre comprador y vendedor, ii) solicitar exclusivamente el nombre, apellido, e-mail y teléfono a los usuarios interesados en ponerse en contacto con el vendedor y/o arrendador a través del chat de la página web, aplicación web o móvil, advirtiendo que el operador no se hace responsable del contenido de la información que se dé entre los usuarios mediante dicho medio,  ni en las llamadas telefónicas que se realicen a los usuarios oferentes por parte de los usuarios receptores o anónimos interesados en arrendar o comprar los bienes publicados por los primeros, iii) prever los medios y medidas de seguridad administrativas, técnicas y físicas obligatorias y necesarias que permitan proteger los datos personales informados por los usuarios al momento de creación de perfiles, inscripción de inmuebles y de contactar a los vendedores y arrendadores a través del chat colocándose de presente que la información requerida para registrarse, inscribir bienes, publicar, y contactar a los vendedores y arrendadores no refiere a datos sensibles.<br><br>
					No obstante, se pone de presente que en virtud al contacto directo que debe existir entre las partes de los contratos de arrendamiento y compraventa, toda la información otorgada por el usuario oferente será puesta en la publicación realizada por este, sin que ello implique darle un mal tratamiento a los datos personales del mismo. Además, que los datos personales del usuario oferente sólo estarán anunciados durante el término de la vigencia de la publicación. Los datos personales del perfil del usuario receptor no serán publicados, serán privados y únicamente conocidos por el operador de la web, toda vez que aquel aplica a ofertas de arriendo y de venta pero no realiza publicaciones, además que puede eliminar su perfil en cualquier momento. Respecto al usuario anónimo, este último no tendrá que dar datos de ninguna índole al operador mediante la página web, aplicación web o móvil, salvo que se coloque en contacto con algún usuario oferente a través del chat de la página web, aplicación web o móvil, en donde deberá señalar el nombre, apellido, e-mail y teléfono.<br><br>
					Así mismo, se advierte que la recopilación de datos personales se realiza solo para lo siguiente: i) crear el perfil de los usuarios y así puedan ser contactados por los interesados en los productos publicados, ii) los usuarios interesados en los bienes publicados puedan contactar a los usuarios oferentes a través del chat de la página web, aplicación web o móvil, iii) efectuar el pago de la prestación del servicio de la página web y aplicación web o móvil en el supuesto de que haya de hacer un pago por la publicación, iv) la información de los inmuebles y fotografías es para ofrecerlos en la página web y aplicación web o móvil y puedan ser visualizados por los usuarios interesados en arrendarlos o venderlos, v) generar una base de datos de propiedad del operador BIZANI S.A.S. incluso cuando los perfiles hayan sido eliminados del sitio web, aplicación web o móvil, en virtud a la aceptación y autorización que otorgan los usuarios al momento de crear los perfiles. Sin embargo, dicha base de datos será de uso exclusivo del operador, con el objeto de ofrecer sus otros productos y servicios, mercadotecnia, publicidad, incluso remitir publicaciones que podría interesar al tercero atendiendo las actividades que haya realizado con su perfil.<br><br>
					MODIFICACIÓN DE LOS DATOS PERSONALES<br><br>
					Los usuarios oferentes y receptores podrán corregir, modificar y actualizar los datos personales de su perfil, la de los inmuebles, habitaciones, los locales comerciales, hoteles y hostales directamente a través de sus cuentas en la página web, aplicación web y móvil, la cual será revisada nuevamente por el operador y autorizada siempre y cuando los cambios correspondan al bien que se registró y no a otro diferente, pues con las modificaciones a la información no puede terminar registrándose otro,  ya que si se trata de uno nuevo, deberá hacer un registro diferente y  pagar el monto estipulado en el caso de que exista dicho pago, lo anterior, por cuanto cada inmueble debe tener de forma independiente su registro para no inducir a error a los usuarios receptores y anónimos.<br><br>
					PROTECCIÓN DEL PERFIL<br><br>
					El operador a fin de proteger la información  de los usuarios que no sea necesaria relevar con la publicación pero que resulta ser esencial para el registro y la prestación del servicio en la página web y aplicación web y móvil, usará un servidor seguro mediante el cual se encriptan los datos confidenciales, sin embargo, el usuario debe tomar las medidas necesarias para la protección de su perfil, en especial con la contraseña, velando porque tenga un alto nivel de seguridad al no repetir caracteres y usar toda clase de letras, signos y números, dado que el operador no se hará responsable por aquellos daños y perjuicios que se generen por la  pérdida de la contraseña o  mal uso de la misma y del perfil creado.<br><br>
					El usuario deberá informar de manera inmediata al operador a través del icono “Déjanos un comentario” en caso de que no pueda acceder a su perfil, a fin de que se tomen las medidas necesarias y se proteja el perfil y la información puesta en él bloqueando, eliminándolo o recuperando el mismo.<br><br>


				</div>
		
		</div>
	</div>
</div>
<input type="text" id="corrects" style="display:none" value="0">
<?php require_once("../template/login_glass.php"); ?>
<!-- jQuery -->
<?php require_once("../template/includes.php"); ?>

</body>
</html>