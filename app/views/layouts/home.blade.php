<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>@yield('title')</title>

	<!-- Bootstrap core CSS -->
	{{ HTML::style('/../assets/css/bootstrap.min.css', array('media'=>'screen')) }}
	{{ HTML::style('/../assets/css/font-awesome.min.css', array('media'=>'screen')) }}
	<!-- Custom styles for this template -->
	{{ HTML::style('/../assets/css/bootstrap-reset.css', array('media'=>'screen')) }}
	{{ HTML::style('/../assets/css/table-responsive.css', array('media'=>'screen')) }}
	{{ HTML::style('/../assets/css/style.css', array('media'=>'screen')) }}
	{{ HTML::style('/../assets/css/jquery-ui.css', array('media'=>'screen')) }}
	{{ HTML::style('/../assets/css/datepicker.css', array('media'=>'screen')) }}
	
	<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  	<![endif]-->
	</head>
		<body>
			<header role="banner" class="navbar navbar-fixed-top navbar-inverse">
				<div class="container">
					<div class="navbar-header text-left">
						<img src="/../assets/images/logo.png" alt="" height="50px" style="margin:0.2em;" />
						<button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-inverse side-collapse in">
						<nav role="navigation" class="navbar-collapse ">
							<ul class="nav navbar-nav">
								<li><a class="blog-nav-item" href="/">Inicio</a></li>
								<li><a class="blog-nav-item" href="/productos">Productos</a></li>
								<li><a class="blog-nav-item" href="/acerca-de">Acerca de</a></li>
								<li><a class="blog-nav-item" href="/contacto">Contactos</a></li>
							</ul>
							<div class="navbar-right">
								<a class="blog-nav-item" href="http://www.twitter.com/pioggiamare"><span class="fa fa-twitter fa-lg white"></span></a>
								<a class="blog-nav-item" href="http://www.instagram.com/pioggiadimare"><span class="fa fa-instagram fa-lg white"></span></a>
								<a class="blog-nav-item" href="http://www.facebook.com/pioggiamare"><span class="fa fa-facebook fa-lg white"></span></a>
								<a class="blog-nav-item" href="http://www.pinterest.com/pioggiadimare"><span class="fa fa-pinterest fa-lg white"></span></a>
								<a class="blog-nav-item lavel lavel-success cart-text" href="/carrito"> <span class="badge">{{ Cart::count(); }}</span> Carrito <span class="fa fa-shopping-cart fa-lg white"></span></a>
								@if (Auth::check())
									<span class="dropdown blog-nav-item">
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">
											<span class="username">{{ Auth::user()->full_name; }}</span>
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu extended logout">
										@if (Auth::user()->role_id == 1)
											<li><a href="/admin"><i class="fa fa-dashboard"></i>  Panel de Administracion</a></li>
										@endif
											<li><a href="/orders"><i class="fa fa-shopping-cart"></i>  Mis Pedidos</a></li>
											<li><a href="/logout"><i class="fa fa-sign-out"></i>  Salir</a></li>
										</ul>
									</span>
								@else
									<a class="blog-nav-item lavel lavel-success" href="/registrarse">Registrarte</a>
									<a class="blog-nav-item" href="/login">Identificarse  <i class="fa fa-sign-in"></i></a>
								@endif
							</div>
						</nav>
					</div>
				</div>
			</header>
			<div class="blog-header">
				<div class="container">
					<h1 class="blog-title">ActiveWear</h1>
					<p class="lead blog-description">Catalogo de ropa para la actividad deportiva, ventas y mas...</p>
				</div>
			</div>

			@yield('content')

			<footer class="blog-footer">
				<p>Creado por <a href="http://craftersama.me">CrafterSama Studio</a></p>
				<p><a href="#">Back to top</a></p>
			</footer>
		{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		{{ HTML::script('/../assets/js/bootstrap.min.js') }}
		{{ HTML::script('/../assets/js/jquery.validate.js') }}
		{{ HTML::script('/../assets/js/jquery-ui.min.js') }}
		{{ HTML::script('/../assets/js/common.js') }}
	    <script type="text/javascript">
		    /* GEO */
		    $(document).on("ready", function(){

		        var $estados = $("#estados");
		        var $municipios = $("#municipios");

		        $.post('/geo/estados', function(data, textStatus, xhr) {                
		            $.each(data, function(index, val) {
		                var option = '<option value="' + val.id +'">' + val.estado +'</option>';
		                $estados.append(option);
		            }); 
		        },'json');

		        $estados.on("change", function(){
		            var id = $(this).val();
		            resetMunicipios();
		            $.post('/geo/estado/' + id, function(data, textStatus, xhr) {                
		                $.each(data, function(index, val) {
		                    var option = '<option value="' + val.id +'">' + val.ciudad +'</option>';
		                    $municipios.append(option);
		                }); 
		            },'json');
		        });

		        function resetMunicipios(){
		            $municipios.empty();
		            var option = '<option> -- Seleccione --</option>';
		            $municipios.append(option);
		        }
		    });
		    $(function(){
	    	    $('#order').validate({
	        	    rules :{
	        	    	banco : {
	        	    		required : true,
	        	    	},
	        	    	recibo : {
	        	    		required : true,
	        	    		number : true
	        	    	},
	        	    	monto : {
	        	    		required : true,
	        	    		number : true

	        	    	},
	        	    	fecha : {
	        	    		required : true,
	        	    		date : true

	        	    	},
	        	    	adjunto : {
	        	    		required : true
	        	    	},
	        	    	options : {
	        	    		required : true
	        	    	},
	        	    	/*if ($('#no').is(':checked')) {*/
		        	    	user_address : {
		        	    		required : true,
		        	    		maxlenght : 140
		        	    	},
		        	    	estado : {
		        	    		required : true
		        	    	},
		        	    	municipio : {
		        	    		required : true
		        	    	},
		        	    /*}*/
		            },
		            messages : {
		                banco : {
		                    required : "Debe ingresar el nombre del banco en el cual realizo el deposito o transferencia",
		                },
		                recibo : {
		                    required : "Debe ingresar el numero del recibo",
		                    number    : "Solo puede ingresar caracteres numericos"
		                },
		                monto : {
		                    required : "Debe Ingresar el Monto de la Transferencia o Deposito",
		                    number    : "Solo puede ingresar caracteres numericos"
		                },
		                fecha : {
		                    required : "Debe Ingresar la fecha en la que realizo la Transferencia o Deposito",
		                    date : "El Formato debe Ser de Fecha"
		                },
		                adjunto : {
		                    required : "Debe subir una imagen"
		                },
		                options : {
		                    required : "Debe Seleccionar Si o No"
		                },
		                /*if ($('#no').is(':checked')) {*/
			                user_address : {
			                    required : "Este Campo es Obligatorio, debe ingresar su nueva dirección"
			                },
			                estados : {
			                    required : "Seleccione el estado"
			                },
			                municipios : {
			                    required : "Seleccione el municipio"
			                },
		                /*}*/
		            }
		        });    
		    });
	        $(document).on('ready', function(){
	            $(".add-to-cart").on("click", function(event){
	                event.preventDefault();
	                var id = $(this).data('id');
	                var qty = $("select[name=qty]").val() || 1;
	                $.post('/cart/' + id + '/add/' + qty, function(data, textStatus, xhr) {
	                    $.post('/total', function(data, textStatus, xhr) {
	                        $(".cart-text").html(data);
	                    });
	                });
	                $('#carrito').removeClass('hide');
	                $(this).removeClass('btn-success');
	                $(this).addClass('btn-info');
	                $(this).html('<i class="fa fa-check fa-lg"></i> Agregado');
	            })
	        });
	        $(function() {
    			$( "#datepicker" ).datepicker({
					direction: 'up',
					constrainInput: true,
					showOn: "both",
					showAnim: "fade",
					buttonImage: "/../assets/images/calendar.png",
					buttonImageOnly: true,
					dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
					monthNamesShort: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
					'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
					yearRange: '2014:2025',
					dateFormat: 'dd/mm/yy',
					changeMonth: true,
					changeYear: true
    			});
			});
		</script>
	</body>
</html>
