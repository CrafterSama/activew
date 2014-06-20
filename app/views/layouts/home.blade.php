<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>@yield('title', 'Activewear Venezuela')</title>

	<!-- Bootstrap core CSS -->
	{{ HTML::style('assets/css/bootstrap.min.css', array('media'=>'screen')) }}
	{{ HTML::style('assets/css/font-awesome.min.css', array('media'=>'screen')) }}
	<!-- Custom styles for this template -->
	{{ HTML::style('assets/css/bootstrap-reset.css', array('media'=>'screen')) }}
	{{ HTML::style('assets/css/table-responsive.css', array('media'=>'screen')) }}
	{{ HTML::style('assets/css/style.css', array('media'=>'screen')) }}

	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
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
											<li><a href="/pedidos"><i class="fa fa-shopping-cart"></i>  Mis Pedidos</a></li>
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
					<h1 class="blog-title">ActiveWear Venezuela</h1>
					<p class="lead blog-description">Catalogo de ropa para la actividad deportiva, ventas y mas...</p>
				</div>
			</div>

			@yield('content')

			<div class="blog-footer">
				<p>Creado por <a href="http://twitter.com/csamastudio">CrafterSama Studio</a></p>
				<p><a href="#">Back to top</a></p>
			</div>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		{{ HTML::script('assets/js/bootstrap.min.js') }}
		{{ HTML::script('assets/js/common.js') }}

		@yield('javascript')
	</body>
</html>
