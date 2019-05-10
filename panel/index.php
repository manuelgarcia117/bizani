<?php
$http = "https:";
$url = $http."//bizani-manuelgarcia117.c9users.io/panel/";
?>
<html lang="es" >
<head>
	<title>Panel Bizani	</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="user-scalable=0, user-scalable=no, width=device-width, initial-scale=1">
		<!-- Meta SEO -->
	<link rel="icon" type="image/png" href="http://www.bizani.com/wp-content/themes/starter/img/favicon.png">
	<link rel="canonical" href="http://www.bizani.com/" />
	<meta name="application-name" content="Bizani" />
	<meta name="author" content="Bizani SAS" />
	<meta name="distributor" content="Bizani SAS" />
	<meta name="robots" content="All" />
	<meta name="description" content="Buscar un inmueble nunca ha sido tan facil, habitaciones en arriendo, alquiler vacacional, vivienda y negocios en venta o arriendo." />
	<meta name="keywords" content="habitaciones en arriendo, casas en arriendo, casas en venta, negocio en venta, negocio en arriendo, alquiler de apartamentos, apartamento, casa, finca, lote, aparta estudio, vivienda loft, casa lote, cabaña, chalet, oficina, local, centro industrial, centro de negocios, consultorio, parqueadero, lavadero. zona industrial, zona comercial" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Panel Bizani"/>
	<meta property="og:url" content="http://www.bizani.com/" />
	<meta property="og:site_name" content="Bizani" />
	<meta property="og:image" content="http://www.bizani.com/images/promo_bizani.jpg" />
	<meta property="og:description" content="Buscar un inmueble nunca ha sido tan facil, habitaciones en arriendo, alquiler vacacional, vivienda y negocios en venta o arriendo." />
	<!-- //Meta SEO -->
			<!--STYLES -->
	<link rel="stylesheet" href="<?=$url?>css/loader.css">
	<link rel="stylesheet" href="<?=$url?>css/main.min_v0.0.3.css">
	<link rel="stylesheet" href="<?=$url?>css/style.css" media="bogus">
	<link rel="stylesheet" href="<?=$url?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$url?>css/custom.css">
    <script src="<?=$url?>js/jquery-3.1.0.min.js"></script>
    <script src="<?=$url?>js/jquery-ui.min.js"></script>
    <script>
    
    function ocultar(){
    	$("#mensajeerror").slideUp();
    }
    
	function login(){
		var email=$("#username").val();
		var clv=$("#password").val();
		$.get("controller/login.php", {email:email, clave:clv}, function(data){
		var response = jQuery.parseJSON(data);
		//alert(response);
		console.log(response);
			if(response.status=="1"){
				location.href="opciones.php"; 
			} 
			if(response.status=="0"){
				$("#mensajeerror").slideDown();
			}
		});
	}
	</script>
</head>
<body>
	<div class="ui-load">
		<div id="loading">
	<div class="location_indicator">
		<img src="<?=$url?>img/logo-loader-panel.png" alt="">
	</div>
</div>	</div>
	<div class="ui-nav">
			<div class="menubox noselect">
		<div class="circle"></div>
		<div class="menue">
			<ul>
				<li class="noselect cuentanos">Déjanos tu sugerencia</li>
				<!--
				<li class="noselect">Conócenos</li>
				<li class="noselect">Blog</li>
				<li class="noselect">Videos</li>
				<li class="noselect">Ayuda</li>
				-->
			</ul>
		</div>
	</div>
	<nav class="transition" id="nav">
		<div class="menu_mobile">
			<div class="burger">
			<div class="x"></div>
			<div class="y"></div>
            <div class="z"></div>
		</div> 
		</div>
					    <a href="https://panel.bizani.com/"><div class="logo"></div></a>
						<div class="menu_web">
				<ul>
				<li class="noselect cuentanos">Déjanos tu sugerencia</li>
				<!--
					<li class="noselect">Conócenos</li>
					<li class="noselect">Blog</li>
					<li class="noselect">Videos</li>
					<li class="noselect">Ayuda</li>
					-->
				</ul>
			</div>
		</nav>
		<div class="cuentanos_box clearfix">
		<div class="cuentanos_inner clearfix">
		<div class="cuentanos_head">Déjanos tu opinión</div>
		<input type="email" class="email_cuentanos" placeholder="Email">
		<select name="" class="select_cuentanos">
			<option value="0" selected disabled>Selecciona Tipo</option>
			<option value="Petición">Petición</option>
			<option value="Queja">Queja</option>
			<option value="Reclamo">Reclamo</option>
			<option value="Felicitación">Felicitación</option>
			<option value="Aporte">Aporte</option>
			<option value="Sugerencia">Sugerencia</option>
		</select>
		<div class="title_cuentanos">Mensaje:</div>
		<textarea class="textarea_cuentanos">
		</textarea>
		<div class="enviar_cuentanos">Enviar</div>
		<div class="cancelar_cuentanos">Cancelar</div>
		</div>
	</div>     
	</div>
	<div class="ui-body">
		    <div class="content" id="content">
        <div class="welcome">
                <h1 class="title">
                    Prueba todo el poder de <strong>Bizani</strong>
                </h1>
                <div id="mensajeerror">Datos de acceso no validos</div>
                <form action="#" method="post">
                    <div class="form-input">
                        <label for="username">Email:</label>
                        <input type="text" id="username" name="_username" value="" onfocus="ocultar()"/>
                    </div>
                    <div class="form-input">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="_password" onfocus="ocultar()"/>
                    </div>
                    <button type="button" onclick="login()">Ingresar</button>
                </form>
        </div>
    </div>
	</div>
</body>
<!--<link rel="stylesheet" href="/css/main.min_v0.0.3.css" />-->
<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</html>