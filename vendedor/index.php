<?php
session_start();
require_once("../web_control/db.php");
require_once("../web_control/vars.php");
if($type!=0){
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file: -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
	    .div_inm:hover{cursor:pointer;}
    </style>
	
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background: #95c742 !important;color: white;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color: white;">Bizani Administrador</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" style="float: right;">
                <?=$_SESSION["name_bizani"]?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="https://bizani.com/perfil/"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                      <!--  <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-->
                        <li class="divider"></li>
                        <li><a href="https://bizani.com/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>  
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            
                        </li>-->
                        
                        <li>
                            <a href="index.php" style="color: black;"><i class="fa fa-dashboard fa-fw"></i> Administrador de Inmuebles</a>
                        </li>
                        <li>
                            <a href="../perfil" style="color: black;"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="tables.html" style="color: black;"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html" style="color: black;"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
           <br>
            <div class="row" id="graficas">
                <div class="col-lg-6">
                    <div class="panel panel-default">
			<div class="panel-heading">
				Pie Chart Example
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="flot-chart">
					<div class="flot-chart-content" id="flot-pie-chart" style="padding: 0px; position: relative;">
						
					</div>
					<div id="pie-placeholder" class="flot"></div>
				</div>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
                </div>
                
                 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Donut Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="grafica_donut">
                            <div id="morris-donut-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
            </div>
            <!-- /.row -->
           
        
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Inmuebles</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row" id="my_inm_content">
                             
                
            </div>
            <!-- /.row -->
            
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/morris-data.js"></script>
    
    <!-- Flot Charts JavaScript -->
    <script src="js/excanvas.min.js"></script>
    <script src="js/jquery.flot.js"></script>
    <script src="js/jquery.flot.pie.js"></script>
    <script src="js/jquery.flot.resize.js"></script>
    <script src="js/jquery.flot.time.js"></script>
    <script src="js/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    <script>
		
	//$("#div_clave").slideUp(0);
	//$(".change_foto").slideUp(0);
	
	function get_my_inm(ids){
		
		$.get("https://bizani.com/administrador/get_mis_inmuebles.php",{id:ids}, function(data){
			//alert("as");
			
						
			$("#my_inm_content").html("");
			$("#graficas").slideUp(0);
			console.log("mis inm size array : "+data.id.length);
			for (var i=0; i<(data.id.length); i++) {
			 var cant_likes=data.cantidadlikes[i];
			 var cant_visitas=data.cantidadvisitas[i];
				
			
			var status="";
				if(data.status[i]=="pending"){status="Estado: Pendiente"}
				if(data.status[i]=="property"){status="Estado: Publicado"}
				$("#my_inm_content").append('<a title="Ver Inmueble" class="ainm" href="<?=$url?>inmueble/'+data.id[i]+'" target="_blank">'+
							'<div class="col-lg-3 col-md-6 div_inm" >'+
								'<div class="panel panel-primary" style="border-color: #ccc;">'+
									'<div class="panel-heading" style="background: url(<?=$url?>images/inm/'+data.id[i]+'/0.jpg);background-size: cover; height: 150px;">'+
									   
									'</div>'+
									'<a href="#" style="color: #95c742;">'+
										'<div class="panel-footer">'+
											'<span class="pull-left" onclick="get_graficas('+data.id[i]+')">Ver Estadisticas</span>'+
											'<span class="pull-right" style="margin-left: 11px;"><i class="fa fa-heart"></i> '+ data.cantidadlikes[i]+'</span>'+
											'<span class="pull-right" style="margin-left: 11px;"><i class="fa fa-eye"></i> '+ data.cantidadvisitas[i]+'</span>'+
											'<div class="clearfix"></div>'+
										'</div>'+
									'</a>'+
								'</div>'+
							'</div>'+
						'</a>');
			};
		}, "json");
	};
	
	
	function get_graficas(id_inm){
		//alert("sas");
		$.get("https://bizani.com/administrador/get_graficas.php",{id:id_inm}, function(data){
						
			$("#graficas").slideDown(0);
			$("#grafica_donut").html("");
			$("#grafica_donut").append('<div id="morris-donut-chart"></div>');
			console.log("mis inm size array : "+data.id.length);
			for (var i=0; i<(data.id.length); i++) {
			 var cant_likes=data.cantidadlikes[i];
			 var cant_visitas=data.cantidadvisitas[i];
			 	
			 	if(cant_likes==0 && cant_visitas==0){cant_visitas=1;}
				
				var mychart =Morris.Donut({
				  element: 'morris-donut-chart',
				  data: [
				    {label: "Favoritos", value: cant_likes},
				    {label: "Visitas", value: cant_visitas}
				  ],
				  backgroundColor: '#ccc',
				  labelColor: '#0f9d59',
				  colors: [
				    '#dc4439',
				    '#f6b207'
				  ]
				});
				
				$(function() {
				
				    var data = [{
				      	color:'#dc4439',
				        label: "Favoritos",
				        data: cant_likes
				    }, {
				    	color:'#4286f5',
				        label: "Visitas",
				        data: cant_visitas
				    }];
				
				    var plotObj = $.plot($("#flot-pie-chart"), data, {
				        series: {
				            pie: {
				                show: true
				            }
				        },
				        grid: {
				            hoverable: true
				        },
				        tooltip: true,  
				        tooltipOpts: {
				            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
				            shifts: {
				                x: 20,
				                y: 0
				            },
				            defaultTheme: false
				        }
				    });
				
				});
			
			
			
				
			};
		}, "json");
	};
	
	
    get_my_inm(<?=$_SESSION['id_bizani']?>);
    </script>

</body>

</html>
<?php
} else {
?>
<script>
	window.location.href = "<?=$url?>";
</script>
<?php
}
?>