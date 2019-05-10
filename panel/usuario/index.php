<?php
session_start();
include("../controller/vars.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noodp, noimageindex, notranslate, nocache" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="generator" content="EasyAdmin" />
        
        <title>Inmuebles Pendientes</title>

            <link rel="stylesheet" href="<?=$url?>css/easyadmin-all.min.css">
            <style>
                 .sf-toolbarreset { -webkit-font-smoothing: subpixel-antialiased; -moz-osx-font-smoothing: auto; } body { font-family: Helvetica, "Helvetica Neue", Arial, sans-serif; } a { color: #205081; } a:hover { opacity: 0.9; } a:active { outline: 0; } #main a:active { position: relative; top: 1px; } a.text-primary, a.text-primary:focus { color: #205081; } a.text-danger, a.text-danger:focus { color: #D42124; } a.text-primary:hover, a.text-danger:hover { opacity: 0.9; } ul, ol { margin: 1em 0 1em 1em; padding: 0; } li { margin-bottom: 1em; } ul.inline { list-style: none; margin: 0; } ul.inline li { margin: 0; } div.flash { padding: .5em; } div.flash-success { background: #006B2E; color: #FFFFFF; } div.flash-error { background: #D42124; color: #FFFFFF; } div.flash-error strong { padding-right: .5em; } .label:not([class*=label-]) { background: #444; } .label { color: #FFFFFF; display: inline-block; font-size: 11px; padding: 4px; text-transform: uppercase; } .label-success { background: #006B2E !important; } .label-danger { background: #D42124 !important; } .label-empty { background: transparent; border: 2px dotted; border-radius: 4px; color: #F5F5F5; padding: 4px 8px; } .boolean .label, .toggle .label { min-width: 33px; } .toggle.btn-xs { width: 44px; } .toggle-group .btn, .toggle-group .btn:hover { border-radius: 3px; font-size: 10px; font-weight: bold; text-transform: uppercase; } .toggle-group .btn { padding: 4px 6px; } .toggle-group .btn:hover { border: 0; } .toggle-group .btn + .btn { margin-left: 0; } .toggle-group .toggle-on, .toggle-group .toggle-on.btn-xs, .toggle-group .toggle-on:hover, .toggle-group .toggle-on:active, .toggle-group .toggle-on:active:hover { background: #006B2E; border-color: #006B2E; color: #FFFFFF; padding: 4px 5px 4px 0; border: 0; } .toggle-group .toggle-off, .toggle-group .toggle-off.btn-xs, .toggle-group .toggle-off:hover, .toggle-group .toggle-off:active, .toggle-group .toggle-off:active:hover { background: #D42124; border-color: #D42124; color: #FFFFFF; padding: 4px 0 4px 5px; border: 0; } .toggle-group .toggle-handle, .toggle-group .toggle-handle:hover, .toggle-group .toggle-handle:active, .toggle-group .toggle-handle:active:hover { background: #FAFAFA; border: 0; border-radius: 2px; height: 19px; margin-top: 2px; padding: 5px; } .toggle .btn-success .toggle-handle { box-shadow: -2px 0 1px rgba(0, 0, 0, .2); } .toggle .btn-danger .toggle-handle { box-shadow: 2px 0 1px rgba(0, 0, 0, .2); } span.badge { background-color: rgba(150, 200, 64, 1); } .btn:focus { outline: none; } .btn + .btn { margin-left: 5px; } button.btn:active { position: relative; top: 1px; } .btn, .btn:hover, .btn:active, .btn:focus, .btn:active:hover { background: #CCC; border: 1px solid transparent; border-radius: 4px; box-shadow: none; color: #444444; display: inline-block; line-height: 1.42857143; opacity: 1; outline: none; padding: 6px 12px; text-align: center; } .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:focus, .btn-primary:active:hover { background-color: rgba(150, 200, 64, 1); border-color: transparent; color: #FFFFFF; } .btn-default, .btn-default:hover, .btn-default:active, .btn-default:focus, .btn-default:active:hover { border-color: transparent; } .btn-danger, .btn-danger:hover, .btn-danger:active, .btn-danger:focus, .btn-danger:active:hover { background-color: #D42124; border-color: transparent; color: #FFFFFF; } .btn-success, .btn-success:hover, .btn-success:active, .btn-success:focus, .btn-success:active:hover { background-color: #006B2E; border-color: transparent; color: #FFFFFF; } .btn-secondary, .btn-secondary:hover, .btn-secondary:active, .btn-secondary:focus, .btn-secondary:active:hover { background: transparent; color: rgba(150, 200, 64, 1); text-decoration: underline; } .btn-secondary:hover { text-decoration: none; } .btn-primary, .btn-danger, .btn-success { font-weight: bold; } .btn i { font-size: 16px; margin-right: 2px; } .btn-flat, .btn-flat:hover, .btn-flat:active, .btn-flat:focus, .btn-flat:active:hover { border-radius: 0; } .form-inline .form-control { margin-bottom: 5px; } .form-control, .form-inline .form-control { border: 1px solid #CCC; border-radius: 0; color: #444444; -webkit-transition: none; transition: none; } .form-control:focus { border-color: #444; } .has-error .error-block { color: #D42124; font-weight: bold; padding-top: 5px; } .has-error .error-block .label-danger { margin-right: 3px; } .has-error .error-block ul { margin: .5em 0 .5em 1.5em; } .has-error .error-block ul li { margin-bottom: .5em; } .help-block, .has-error .help-block { color: #737373; font-size: 13px; } .nullable-control { padding-top: 5px; } .form-actions.stuck { bottom: 0; position: fixed; background-color: #F5F5F5; box-shadow: 0 -1px 4px #CCC; height: 52px; padding-top: 10px; z-index: 9999; } .field-collection .collection-empty { margin: .5em 0; } .field-divider hr { margin-top: 15px; margin-bottom: 26px; border: 0; border-top: 1px solid; border-top-color: #FAFAFA; } .field-group .field-divider hr { border-top-color: #EEE; } .field-section { margin: 16px 0 15px; } .field-section h2 { border-bottom: 1px solid #EEE; color: #444; font-size: 16px; padding-bottom: 6px; } .field-section h2 i { color: #777; margin-right: 2px; } .field-section p.help-block { margin: 8px 0 0; } .field-group .box { border: 1px solid #EEE; box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05); } .field-group .box-header i { color: #777; margin-right: 2px; } .field-group .box-header.with-border { background: #F5F5F5; border-bottom-color: #EEE; color: #444; padding: 11px 10px 9px; } .field-group .box-header .box-title { color: #777; } .field-group .box-body { padding: 15px 15px 5px; } .field-group .box-body > .help-block { margin-top: 0; } .select2-container { width: 100% !important; } .select2-container--bootstrap .select2-selection { border: 1px solid #CCC; border-radius: 0; box-shadow: 0 0 3px rgba(0, 0, 0, .15); color: #444444; -webkit-transition: none; transition: none; } .select2-container--bootstrap .select2-selection .select2-search--inline { margin: 0; } .select2-container--bootstrap .select2-selection--single .select2-selection__rendered { color: #444444; padding-top: 4px; } .select2-container--bootstrap .select2-results__option { margin-bottom: 0; } .select2-container--bootstrap .select2-results__option[aria-selected=true] { background-color: #F5F5F5; font-weight: bold; } .select2-container--bootstrap .select2-results__option--highlighted[aria-selected] { background-color: rgba(150, 200, 64, 1); } .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice { color: #444444; } .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice__remove { color: #D42124; font-weight: bold; position: relative; top: -1px; } .select2-container--bootstrap .select2-search--dropdown .select2-search__field { border: 1px solid #AAA; border-radius: 0; margin: 5px 10px; padding: 6px; width: 96%; } .select2-search--inline .select2-search__field:focus { outline: 0; border: 0; } .easyadmin-vich-image img { border: 3px solid #FFFFFF; box-shadow: 0 0 3px #CCC; max-height: 300px; max-width: 400px; } .easyadmin-vich-image input[type="file"], .easyadmin-vich-file input[type="file"] { padding-top: 7px; } .easyadmin-vich-file a { display: inline-block; padding-top: 7px; } .easyadmin-vich-file .field-checkbox { margin-bottom: 0; } .easyadmin-vich-file .field-checkbox .col-sm-2, .easyadmin-vich-image .field-checkbox .col-sm-2 { display: none; } .easyadmin-thumbnail img { border: 3px solid #FFFFFF; box-shadow: 0 0 3px #CCC; max-height: 100px; max-width: 100%; } .easyadmin-thumbnail img:hover { cursor: zoom-in; } .featherlight .easyadmin-lightbox:hover { cursor: zoom-out; } .easyadmin-lightbox { display: none; } .featherlight .easyadmin-lightbox { display: block; } .easyadmin-lightbox img { max-width: 100%; } .modal-dialog .modal-content { border-radius: 0; } .modal-dialog .modal-content .modal-body h4 { font-size: 21px; margin: .5em 0; } .modal-dialog .modal-footer { background: #FAFAFA; border-top: 1px solid #F5F5F5; margin-top: 1.5em; } .newrow, .new-row { clear: both; display: block; } .content-wrapper { background: #FFFFFF; } .fixed .content-wrapper { padding-top: 50px; } .main-header { background: rgba(150, 200, 64, 1); position: relative; } .main-header .logo { color: #FFFFFF; font-family: Helvetica, "Helvetica Neue", Arial, sans-serif; font-size: 18px; font-weight: bold; height: 45px; line-height: 45px; padding: 0; } .main-header .logo-long .logo-lg { font-size: 16px; } .main-header .logo-lg { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; } .main-header #header-logo { } .main-header img { margin-top: -2px; max-height: 36px; } .main-header li { margin-bottom: 0; } .main-header > .navbar { background-color: rgba(150, 200, 64, 1); color: rgba(255, 255, 255, 0.9); margin-left: 0; min-height: 40px; } .main-header .navbar .sidebar-toggle { color: rgba(255, 255, 255, 0.8); display: inline-block; font-size: 16px; height: 35px; left: 0; line-height: 35px; padding: 0 15px; position: absolute; text-align: center; top: 45px; } .sidebar-mini.sidebar-collapse .sidebar-toggle { color: #FFFFFF; } .navbar-custom-menu, .navbar-custom-menu ul.navbar-nav, .navbar-custom-menu ul.navbar-nav .user-menu { float: none; } .navbar-custom-menu { background: rgba(255, 255, 255, 0.1); color: rgba(255, 255, 255, 0.8); font-size: 13px; font-weight: bold; height: 35px; line-height: 35px; padding: 0 15px; text-align: right; width: 100%; } #content #main { padding-bottom: 3em; } .content { padding-top: 10px; } .content-header { padding: 12px 15px 0 15px; } .content-header h1 { margin: 0; font-size: 24px; } .main-sidebar, .wrapper { background-color: #F5F5F5; } .main-sidebar { padding-top: 80px; } .sidebar-menu li.header { color: #AAA; font-size: 12px; font-weight: bold; text-transform: uppercase; } .treeview-menu > li.header { background-color: #FAFAFA; padding-left: 28px; } .sidebar-menu li a, .sidebar-menu li a span, .sidebar-menu li.header, .sidebar-mini.sidebar-collapse .sidebar-menu .treeview-menu a { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; } .sidebar-mini.sidebar-collapse .sidebar-menu li a { overflow: visible; } .sidebar-menu > li > a, .sidebar-menu .treeview-menu > li > a { color: #444; border-left: 3px solid transparent; display: block; font-weight: bold; opacity: 1; } .sidebar-menu .treeview-menu > li > a { background-color: #FAFAFA; font-size: 13px; padding: 8px 5px 8px 25px; } .sidebar-menu > li:hover > a, .sidebar-menu .treeview-menu > li:hover > a, .sidebar-menu > li.active > a, .sidebar-menu .treeview-menu > li.active > a, .sidebar-collapse .sidebar-menu > li.active.submenu-active > a, .sidebar-collapse .sidebar-menu > li:hover .treeview-menu > li.active > a { background: #DCDCDC; border-left-color: #808080; } .sidebar-menu > li > a > .fa { width: 22px; } .sidebar-menu .treeview-menu { padding: 0; } .sidebar-menu li > a > .pull-right { font-weight: bold; text-align: right; } .sidebar-menu li.active > a > .fa-angle-left { top: 30px; right: 0; } .sidebar-collapse .sidebar-menu > li > a { padding: 12px 5px 12px 12px; } .sidebar-collapse .sidebar-menu > li .treeview-menu > li > a { padding-left: 12px; } .sidebar-collapse .sidebar-menu > li > a > i.fa { font-size: 18px; } .sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu { padding: 0; } .sidebar-collapse .sidebar-menu > li:hover > a, .sidebar-collapse .sidebar-menu .treeview-menu > li:hover > a, .sidebar-menu > li.active.submenu-active > a, .sidebar-collapse .sidebar-menu > li.active.submenu-active:hover > a { border-left-color: transparent; background: #F5F5F5; } .sidebar-mini.sidebar-collapse .sidebar-menu li.header { border-bottom: 1px solid #BBB; display: block !important; font-size: 0; height: 1px; margin: 0; padding: 0; } body.easyadmin h1.title { margin-bottom: 10px; } .help-entity { border: 1px solid #EEE; box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05); color: #737373; margin: 10px 0 5px; } body.list .global-actions { display: table; width: 100%; } body.list .global-actions .button-action { display: table-cell; padding-left: 10px; vertical-align: middle; width: 120px; } body.list .global-actions .button-action a { float: right; } body.list .global-actions .form-action { display: table-cell; width: 100%; } body.list .global-actions .form-action .input-group { width: 100%; } body.list .global-actions .form-control { box-shadow: none; } body.list .global-actions .input-group-btn > button.btn:not(:last-child) { border-bottom-right-radius: 3px; border-top-right-radius: 3px; } body.list .global-actions .input-group-btn a.btn { border-radius: 3px; margin-left: 10px; } body.list .table-responsive, body.list table { background: transparent; border: 0; } body.list table thead { display: none; } body.list .table tbody { background: transparent; border: 0; } body.list table tbody tr { background: #FFFFFF; border: 1px solid #CCC; display: block; margin-bottom: 1em; } body.list table tbody td { border-bottom: 1px solid #E5E5E5; border-top: 0; display: block; vertical-align: middle; } body.list table tbody td:last-child { border-bottom: 0; } table td:before { content: attr(data-label); float: left; font-weight: bold; } table td:after { clear: both; content: ""; display: block; } /* needed because the responsive tables require contents aligned to the right */ body.list table td, body.list table .text-center, body.list table .text-left, body.list table .text-right { text-align: right; } body.list table tbody td.image .easyadmin-thumbnail img { border-width: 2px; max-height: 50px; max-width: 150px; } body.list table tbody td.association .badge { font-size: 13px; } body.list table tbody td.actions a { font-weight: bold; margin-left: 10px; } body.list .table tbody span.highlight { background: #FF9; border-radius: 2px; padding: 1px; } body.list .table tbody .no-results span.highlight, body.list .table tbody .actions span.highlight { background: 0; border-radius: 0; } body.list .pagination { float: right; margin: 0; } body.list .pagination > .disabled > span { background: transparent; border: 1px solid transparent; color: #CCC; } body.list .pagination > li > a { background: #FFFFFF; border-color: #F5F5F5; border-radius: 0; color: #444444; } body.list .pagination > li > a:hover { background: rgba(150, 200, 64, 1); color: #FFFFFF; } .pagination > li > a, .pagination > li > span { padding: 6px 8px; } body.list .pagination > li i { padding: 0 3px; } body.list .pagination.last-page li:nth-child(2) { position: relative; z-index: 1; } form label.control-label.required:after { content: "\00a0*"; color: #D42124; font-size: 16px; position: absolute; } body.new textarea { min-height: 250px; } body.new .field-collection-action { margin: -15px 0 10px; } body.new .field-collection-item-action { margin: 5px 0 0; } body.new #form-actions-row button, body.new #form-actions-row a.btn { margin-bottom: 10px; } body.new .form-horizontal #form-actions-row { padding-left: 15px; padding-right: 15px; } body.edit textarea { min-height: 250px; } body.edit .field-collection-action { margin: -15px 0 10px; } body.edit .field-collection-item-action { margin: 5px 0 0; } body.edit #form-actions-row button, body.edit #form-actions-row a.btn { margin-bottom: 10px; } body.edit .form-horizontal #form-actions-row { padding-left: 15px; padding-right: 15px; } body.show .form-control { background: #FAFAFA; border: 0; border-radius: 0; box-shadow: none; height: auto; } body.show .form-control.text { min-height: 34px; max-height: 250px; overflow-y: auto; } body.error .content-wrapper { align-items: center; display: flex; } body.error .error-description { background: #FFFFFF; border: 1px solid #FAFAFA; box-shadow: 0 0 3px #F5F5F5; max-width: 96%; padding: 0; } body.error .error-description h1 { background: #D42124; color: #FFFFFF; font-size: 18px; font-weight: bold; margin: 0; padding: 10px; text-transform: uppercase; } body.error .error-message { font-size: 16px; padding: 45px 30px; text-align: center; } @media (min-width: 768px) { ul, ol { margin-left: 2em; } .main-header > .navbar { min-height: 50px; } .sidebar-mini.sidebar-collapse .main-header .navbar { margin-left: 0; } .main-header #header-logo { float: left; } .main-header .logo { font-size: 21px; height: 50px; line-height: 50px; text-align: left; transition: padding-left .3s linear; } .sidebar-mini.sidebar-collapse .main-header .logo { padding-left: 15px; width: auto; transition: padding-left .3s linear; } .main-header .navbar .sidebar-toggle { height: 50px; line-height: 50px; position: static; padding: 0 12px 0 18px; } .sidebar-mini.sidebar-collapse .sidebar-toggle { background: rgba(0, 0, 0, 0.15); font-size: 18px; padding-left: 12px; width: 50px; } .navbar-custom-menu, .navbar-custom-menu ul.navbar-nav, .navbar-custom-menu ul.navbar-nav .user-menu { float: right; } .navbar-custom-menu { background: inherit; height: 50px; line-height: 50px; width: auto; } .navbar-custom-menu .user-menu i { padding-right: 4px; } .main-sidebar { padding-top: 50px; } .sidebar-mini.sidebar-collapse .sidebar-menu > li:hover > a > span { padding-left: 5px; } body.list table { background: #FFFFFF; border: 1px solid #FFFFFF; } body.list table thead { display: table-header-group; } body.list table thead th { background: #FAFAFA; padding: 0; } body.list table thead th i { color: #CCC; padding: 0 3px; } body.list table thead th a, body.list table thead th span { color: #444444; display: block; padding: 10px 6px; white-space: nowrap; } body.list table thead th a:hover { background: #F5F5F5; text-decoration: none; } body.list table thead th.sorted, body.list table thead th.sorted a { } body.list table thead th.sorted a:hover i, body.list table thead th.sorted i { color: rgba(150, 200, 64, 1); } body.list th.boolean, body.list td.boolean, body.list th.toggle, body.list td.toggle, body.list td.image { text-align: center; } body.list .table thead tr th { border-bottom: 2px solid #F5F5F5; } body.list .table thead tr th.sorted { border-bottom: 2px outset rgba(150, 200, 64, 1); } body.list .table thead tr th:first-child.sorted { } body.list .table tbody { border-bottom: 2px double #F5F5F5; } body.list table tbody tr { border: 0; display: table-row; margin-bottom: 0; } body.list table tbody td { border-bottom: 0; border-top: 1px solid #E5E5E5; display: table-cell; } table td:before { content: none; float: none; } body.list table tbody td.sorted { background: #FAFAFA; border-color: #E5E5E5; } body.list .table tbody tr:hover td { background: #FAFAFA; } body.list table tbody td.actions a { margin-left: 0; margin-right: 10px; } body.list table td { text-align: left; } body.list table .text-center { text-align: center; } body.list table .text-left { text-align: left; } body.list table .text-right { text-align: right; } .field-date select + select, .field-time select + select, .field-datetime select + select { margin-left: 2px; } body.error .error-description { max-width: 550px; } .pagination > li > a, .pagination > li > span { padding: 6px 12px; } .form-inline .form-control { margin-bottom: 0; } body.new .form-horizontal #form-actions-row { margin-left: 16.66666667%; } body.edit .form-horizontal #form-actions-row { margin-left: 16.66666667%; } .form-vertical .field-checkbox label { padding-top: 23px; } .form-vertical .field-group .field-checkbox label { padding-top: 0; } } 
            </style>
        
            <link rel="stylesheet" href="<?=$url?>css/bizani_theme.css">
            <link rel="stylesheet" href="<?=$url?>css/bootstrap.css">
            <link rel="stylesheet" href="<?=$url?>css/switch.css">
            <script src="<?=$url?>js/jquery-3.1.0.min.js"></script>
            <script src="<?=$url?>js/validaciones.js"></script>
            <link rel="icon" type="image/png" href="/bundles/bizanipanel/img/favicon.png" />
            <script src="<?=$url?>js/easyadmin-all.min.js"></script>
        
            <script>
            var paginaglobal=1;
            var registros = 0;
            var torden = 0;
            var dataglobal;
            function listarusuario(elemento){
                var orden="id";
                var tipoorden="DESC";
                if(elemento==null){
                    orden="id";
                }
                else
                if(elemento=="id"||elemento=="email"||elemento=="name"||elemento=="lastname"||elemento=="cel"||elemento=="tel"||elemento=="registered"){
                    orden=elemento;
                    if(torden==0){
                       torden=1; 
                    }
                    else{
                        torden=0;
                    }
                }
                if(torden==1){
                    tipoorden="DESC";
                }
                else{
                    tipoorden="ASC";
                }
                document.getElementById("lultima").disabled=true;
                if(elemento=="texto"||elemento=="btexto"){
                    paginaglobal=1;
                }
                else
                if(elemento=="primera"||elemento=="primeraa"){
                    paginaglobal=1;
                }
                else
                if(elemento=="anterior"||elemento=="anteriora"){
                    paginaglobal=paginaglobal-1;
                }
                else
                if(elemento=="siguiente"||elemento=="siguientea"){
                    paginaglobal=paginaglobal+1;
                }
                if(elemento=="ultima"||elemento=="ultimaa"){
                    paginaglobal=Math.ceil(registros/100);
                }
                var texto = $("#texto").val().trim();
                var pagina = paginaglobal;
                $("#tlistausuario").children('tr').remove();
                $.get("buscar.php", {texto:texto, pagina:pagina, orden:orden, tipoorden:tipoorden}, function(data){
                // alert(pagina);
                //alert("texto="+texto+"pagina="+pagina+"orden="+orden+"tipoorden="+tipoorden);
		       
	            if(pagina>1){
    		        $("#primera").slideDown();
    		        $("#anterior").slideDown();
    		        $("#primeraa").slideDown();
    		        $("#anteriora").slideDown();
		          }
		        else{
		            $("#primera").slideUp();
    		        $("#anterior").slideUp();
    		        $("#primeraa").slideUp();
    		        $("#anteriora").slideUp();
		        }
		        //enviar/recibir datos mediante json
		        var response = jQuery.parseJSON(data);
		          if(response.status!=0){
		            var idnegrilla;
		            var nombrenegrilla;
		            var apellidonegrilla;
		            var correonegrilla;
		            var celularnegrilla;
		            var telefononegrilla;
		            
    		        dataglobal = response;  
		            $("#tlistausuario").children('tr').remove();
		            console.log(response.id.length);
		            for(var i = 0;i<response.id.length;i++){
		                idnegrilla = response.id[i].replace(texto,"<b>"+texto+"</b>");
		                nombrenegrilla = response.name[i].replace(texto,"<b>"+texto+"</b>");
		                apellidonegrilla = response.lastname[i].replace(texto,"<b>"+texto+"</b>");
		                correonegrilla = response.email[i].replace(texto,"<b>"+texto+"</b>");
		                celularnegrilla = response.cel[i].replace(texto,"<b>"+texto+"</b>");
		                telefononegrilla = response.tel[i].replace(texto,"<b>"+texto+"</b>");
		                $("#tlistausuario").append("<tr><td data-label='ID' class='sorted integer'>"+idnegrilla+"</td><td data-label='Email' class=' string '>"+correonegrilla+"</td><td data-label='Nombre' class=' string '>"+nombrenegrilla+"</td><td data-label='Apellido' class=' string '>"+apellidonegrilla+"</td><td data-label='Celular' class=' string '>"+celularnegrilla+"</td><td data-label='Telefono' class=' string '>"+telefononegrilla+"</td></td><td data-label='Fecha Registro' class=' string '>"+response.fecha[i]+"</td><td data-label='Acciones' class=' string '><button onclick='modal(2,"+i+")'><span data-toggle='modal' data-target='#exampleModal' style='padding-top: 5px;padding-bottom: 5px;padding-left: 10px;padding-right: 10px;' class='fa fa-pencil'></span></button><button onclick='modal(3,"+i+")'><span data-toggle='modal' data-target='#exampleModal' style='padding-top: 5px;padding-bottom: 5px;padding-left: 10px;padding-right: 10px;' class='fa fa-trash'></span></button></td></tr>");
		            }
		            registros=response.total[0];
		            //mostrar total de registros
		            document.getElementById("etotal").textContent=response.total[0];
		            document.getElementById("etotala").textContent=response.total[0];
		            //control de la paginacion
		            document.getElementById("einicial").textContent=(paginaglobal*100)-99;
		            document.getElementById("einiciala").textContent=(paginaglobal*100)-99;
		            //ocultar 
		            //llenar los label con el intervalo de registros mostrados
		            if(response.id.length==100){
		                document.getElementById("efinal").textContent=paginaglobal*100;
		                document.getElementById("efinala").textContent=paginaglobal*100;
		                $("#ultima").slideDown();
		                $("#siguiente").slideDown();
		                $("#ultimaa").slideDown();
		                $("#siguientea").slideDown();
		            }
		            else{
		                document.getElementById("efinal").textContent=response.total[0];
		                document.getElementById("efinala").textContent=response.total[0];
		                $("#ultima").slideUp();
		                $("#siguiente").slideUp();
		                $("#ultimaa").slideUp();
		                $("#siguientea").slideUp();
		            }
		            $(".list-pagination").slideDown();
		          }
		          else{
		              $("#tlistausuario").children('tr').remove();
		              $("#tlistausuario").append("<tr><td colspan='7'><center>No Hay Resultados, Intente Otra Busqueda</center></td></tr>");
		          }
		        });
		      
            }
            
        function modal(num,ind){
        
          if(num==2){
              //   control de elementos crud
              $("#txtFechaRegistro").prop("disabled",true);
              $("#txtNombres").prop("disabled",false);
              $("#txtApellidos").prop("disabled",false);
              $("#txtCorreo").prop("disabled",false);
              $("#txtClave").prop("disabled",false);
              $("#txtCelular").prop("disabled",false);
              $("#txtTelefono").prop("disabled",false);
              $("#btnModificar").slideDown();
              $("#btnEliminar").slideUp();
              $("#lblModificar").slideDown();
              $("#lblEliminar").slideUp();
              $("#txtId").val(dataglobal.id[ind]);
              $("#txtNombres").val(dataglobal.name[ind]);
              $("#txtApellidos").val(dataglobal.lastname[ind]);
              $("#txtClave").val(dataglobal.clave[ind]);
              $("#txtCelular").val(dataglobal.cel[ind]);
              $("#txtTelefono").val(dataglobal.tel[ind]);
              $("#txtCorreo").val(dataglobal.email[ind]);
              $("#txtFechaRegistro").val(dataglobal.fecha[ind]);
          } 
          //eliminar
          if(num==3){
            //   control de elementos crud
              $("#txtFechaRegistro").prop("disabled",true);
              $("#txtNombres").prop("disabled",true);
              $("#txtApellidos").prop("disabled",true);
              $("#txtCorreo").prop("disabled",true);
              $("#txtClave").prop("disabled",true);
              $("#txtCelular").prop("disabled",true);
              $("#txtTelefono").prop("disabled",true);
              $("#btnModificar").slideUp();
              $("#btnEliminar").slideDown();
              $("#lblModificar").slideUp();
              $("#lblEliminar").slideDown();
              $("#lblRegistrar").slideUp();
              $("#btnRegistrar").slideUp();
              $("#txtId").val(dataglobal.id[ind]);
              $("#txtNombres").val(dataglobal.name[ind]);
              $("#txtApellidos").val(dataglobal.lastname[ind]);
              $("#txtClave").val(dataglobal.clave[ind]);
              $("#txtCelular").val(dataglobal.cel[ind]);
              $("#txtTelefono").val(dataglobal.tel[ind]);
              $("#txtCorreo").val(dataglobal.email[ind]);
              $("#txtFechaRegistro").val(dataglobal.fecha[ind]);
          } 
        }    
            
        function modificar(){
            var id = $("#txtId").val();
            var nombre =  encodeURI($("#txtNombres").val());
            var apellido =  encodeURI($("#txtApellidos").val());
            var correo =  encodeURI($("#txtCorreo").val());
            var clave=  encodeURI($("#txtClave").val());
            var tel = $("#txtTelefono").val();
            var cel = $("#txtCelular").val();
            $.get("modificar.php", {id:id,nombre:nombre,apellido:apellido,correo:correo,clave:clave,tel:tel,cel:cel}, function(data){
                var response = jQuery.parseJSON(data);
                if(response.status==1){
                    alert("Usuario modificado con exito");
                    $('#exampleModal').modal('hide');
                    listarusuario();
                }
                else{
                    alert("Se ha prensetando un error, no se pudo modificar el usuario");
                }
            });
        }
        
        
        
        function eliminar(){
            var id = $("#txtId").val();
            $.get("eliminar.php", {id:id}, function(data){
                var response = jQuery.parseJSON(data);
                if(response.status==1){
                    alert("Usuario eliminado con exito");
                    $('#exampleModal').modal('hide');
                    listarusuario();
                }
                else{
                    alert("Se ha prensetando un error, no se pudo eliminar el usuario");
                    $('#exampleModal').modal('hide');
                }
            });
        }
        
        
        </script>
    </head>

    <body id="easyadmin-list-User" class="easyadmin sidebar-mini list list-user" onload="listarusuario()">
        <div class="wrapper">
            <header class="main-header">
                
                    <a style="z-index:1" href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" >
                    </a>
                    
                    <div id="header-logo">
                        <a class="logo logo-long" title="" href="<?=$url?>opciones.php">
                            <img src="<?=$url?>img/logo-horizontal.png"/>
                        </a>
                    </div>

            </header>
            
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li class="header">Control de Aplicacion</li>
                            
                            <li class="   ">
                                <a style="background-color:#96c840;color:#FFF">
                                    <i class="fa fa-user"></i>            
                                    <span style="cursor:default;color:#FFF">Usuarios</span>
                                </a>
                            </li>
                            
                            <li class="   ">
                                <a href="../inmueble">
                                    <i class="fa fa-object-ungroup"></i>            
                                    <span>Inmuebles</span>
                                </a>
                            </li>
                            
                            <?php
                                if($rolses==1){
                                   echo'<li class="   ">
                                <a href="../administrador" >
                                    <i class="fa fa-cog"></i>
                                    <span>Administradores</span>
                                </a>
                            </li>'; 
                                }
                            ?>    
                            
                            <li class="   ">
                                <a href="../pendientes">
                                    <i class="fa fa-warning"></i>            
                                    <span>Inmuebles pendientes</span>
                                </a>
                            </li>
                            
                            <li class="   ">
                                <a href="../correo">
                                    <i class="fa fa-envelope"></i>            
                                    <span>Enviar Correo</span>
                                </a>
                            </li>
        
                        <li class="header">
                            Ajustes
                        </li>
                                   
                        <li class="">
                            <a href="../opciones.php" >
                                <i class="fa fa-list"></i><span>Opciones</span>
                            </a>
                        </li>
                                        
                        <li class="">
                            <a href="<?=$url?>controller/logout.php" >
                                <i class="fa fa-reply"></i><span>Cerrar Sesion</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>

            <div class="content-wrapper" id="contenido">
                <div id="flash-messages"></div>
                
                <section class="content-header">
                    <div class="row">
                        <div class="col-sm-5">
                            <h1     class="title">Usuarios</h1>
                        </div>

                        <div class="col-sm-7">
                            <div class="global-actions">
                                <div class="form-action  action-search">
                                    <form>                                                                            
                                        <input type="hidden" name="action" value="search">
                                        <input type="hidden" name="entity" value="User">
                                        <input type="hidden" name="sortField" value="id">
                                        <input type="hidden" name="sortDirection" value="DESC">
                                        <input type="hidden" name="menuIndex" value="">
                                        <input type="hidden" name="submenuIndex" value="">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="query" value="" id="texto" onkeyup="listarusuario(this.id)">
                                            <span class="input-group-btn">
                                                <button class="btn" type=""  id="btexto" onclick="listarusuario(this.id);return(false)">
                                                    <i class="fa fa-search"></i>
                                                    <span class="hidden-xs hidden-sm">Buscar</span>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--paginacion arriba-->
                <section id="main" class="content">
                    
                <!--inicio de la tabla-->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th data-property-name="id" class="sorted  integer ">
                                        <a id="id" onclick="listarusuario(this.id)">
                                            <i class="fa fa-caret-down"></i>
                                            ID
                                        </a>
                                    </th>
                    
                                    <th data-property-name="email" class="  string ">
                                        <a id="email" onclick="listarusuario(this.id)">
                                            <i class="fa fa-sort"></i>
                                            Correo
                                        </a>
                                    </th>
                                    
                                    <th data-property-name="name" class="  string ">
                                        <a id="name" onclick="listarusuario(this.id)">
                                            <i class="fa fa-sort"></i>
                                            Nombre
                                        </a>
                                    </th>
                                                                                                
                                    <th data-property-name="lastname" class="  string ">
                                        <a id="lastname" onclick="listarusuario(this.id)">
                                            <i class="fa fa-sort"></i>
                                            Apellido
                                        </a>
                                    </th>
                                                                                                
                                    <th data-property-name="cel" class="  string ">
                                        <a id="cel" onclick="listarusuario(this.id)">
                                            <i class="fa fa-sort"></i>
                                            Celular
                                        </a>
                                    </th>
                                                                                                
                                    <th data-property-name="tel" class="  string ">
                                        <a id="tel" onclick="listarusuario(this.id)">
                                            <i class="fa fa-sort"></i>
                                            Telefono
                                        </a>
                                    </th>
                                    
                                    <th data-property-name="fecha" class="  string ">
                                        <a id="registered" onclick="listarusuario(this.id)">
                                            <i class="fa fa-sort"></i>
                                            Fecha Registro
                                        </a>
                                    </th>
                
                                    <th>
                                        <span>Acciones</span>
                                    </th>
                                </tr>
                            </thead>
                        <!--inicio de las lista    -->
                        <tbody id="tlistausuario">
                            
                        </tbody>
                    </table>
                </div>

                <div id="pagabajo" class="list-pagination">
                    <div class="row">
                        <div class="col-sm-3" class="list-pagination-counter" id="epaginaciona">
                            <strong id="einiciala"></strong> - <strong id="efinala"></strong> de <strong id="etotala"></strong>
                        </div>

                        <div class="col-xs-12 col-sm-9">
                            <ul class="pagination list-pagination-paginator first-page ">
                                <li id="lprimera">
                                    <a id="primera" onclick="listarusuario(this.id)" style="cursor:pointer"><i class="fa fa-angle-double-left"></i>Primera</a>
                                </li>
                                
                                <li>
                                    <a id="anterior" onclick="listarusuario(this.id)" style="cursor:pointer"><i class="fa fa-angle-left"></i>Anterior</a>
                                </li>
                    
                                <li>
                                    <a id="siguiente" onclick="listarusuario(this.id)" style="cursor:pointer">Siguiente<i class="fa fa-angle-right"></i></a>
                                </li>
                    
                                <li>
                                    <a id="ultima" onclick="listarusuario(this.id)" style="cursor:pointer">Última <i class="fa fa-angle-double-right"></i></a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!--modal-->
                <div class="modal fade" id="exampleModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <!--<h5 class="modal-title" id="lblRegistrar">Registrar</h5>-->
                        <h5 class="modal-title" id="lblModificar">Modificar</h5>
                        <h5 class="modal-title" id="lblEliminar">Eliminar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="formodal">
                            
                            <div id="gallery">
                            </div>
                        <input id="txtId" type="hidden" class="form-control">
                          <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Nombres:</label>
                                <input id="txtNombres" type="text" class="form-control">
                          </div>
                          
                          <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Apellidos:</label>
                                <input id="txtApellidos" type="text" class="form-control">
                          </div>
                          
                          <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Correo:</label>
                                <input id="txtCorreo" type="text" class="form-control">
                          </div>
                          
                          <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Clave:</label>
                                <input id="txtClave" type="text" class="form-control">
                          </div>
                          
                          <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Celular:</label>
                                <input id="txtCelular" type="text" class="form-control">
                          </div>
                          
                          <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Telefono:</label>
                                <input id="txtTelefono" type="text" class="form-control">
                          </div>
                          
                          <div class="form-group">
                                <label for="recipient-name" class="form-control-label">fecha Registro:</label>
                                <input id="txtFechaRegistro" type="text" class="form-control">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <!--<button id="btnRegistrar" type="button" class="btn btn-success">Registrar</button>-->
                        <button id="btnModificar" type="button" class="btn btn-success" onclick="modificar()">Modificar</button>
                        <button id="btnEliminar" type="button" class="btn btn-primary" onclick="eliminar()">Eliminar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--modal-->
                <!--modalcorreo-->
                <div class="modal fade" id="modCorreo">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="lblEnviarCorreo">Enviar Correo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>                                      
                          <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Destinatario:</label>
                                <input id="txtDestintario" type="text" class="form-control">
                          </div>
						  
						  <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Asunto:</label>
                                <input id="txtAsunto" type="text" class="form-control">
                          </div>
                          
						  <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Mensaje:</label>
                                <textarea id="txtMensaje" class="form-control"></textarea>
                          </div>                                                                                     
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button id="btnEnviar" type="button" class="btn btn-success" onclick="../controller/vars.php()">Enviar</button>                       
                      </div>
                    </div>
                  </div>
                </div>
                <!--//modalcorreo-->
            </div>
        </div>
        <!--<script src="/bundles/bizanipanel/js/countdown.js"></script>-->
        </script>
    </body>
</html>
