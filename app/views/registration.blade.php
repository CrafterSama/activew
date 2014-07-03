<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Panel de Administración')</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('assets/css/bootstrap.min.css', array('media'=>'screen')) }}

    <!-- Custom styles for this template -->
    {{ HTML::style('assets/css/adminpanel.css', array('media'=>'screen')) }}
    {{ HTML::style('assets/css/adminpanel-responsive.css', array('media'=>'screen')) }}
    {{ HTML::style('assets/css/table-responsive.css', array('media'=>'screen')) }}
    {{ HTML::style('assets/css/bootstrap-reset.css', array('media'=>'screen')) }}
    {{ HTML::style('assets/css/font-awesome.css', array('media'=>'screen')) }}

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
  <body class="login-body">

    <div class="container">

        {{ Form::open(array('url' => '/registrarse','class' => 'form-signin')) }}
        <h2 class="form-signin-heading">Registrarse</h2>
        <div class="login-wrap">
            @if(Session::has('notice'))
                <div class="alert alert-success">{{ Session::get('notice') }}</div>
                <br>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                <br>
            @endif
            <p>Ingresa tus Datos a Continuación</p>
            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Nombre Completo" required/>
            <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico" required/>

            <div class="form-group">
                <div class="alert alert-info">Debe guardar aqui la direccion a la cual recibe los pedidos, coloque al final la Ciudad y el Estado</div>
                <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Dirección" required />
            </div>
            <div class="form-group">
                <div class="alert alert-info">Ingrese su Numero de telefono o movil para efectos de comunicación</div>
                <input type="text" name="user_mobile" id="user_mobile" class="form-control" placeholder="Telefono" required />
            </div>
            <p> Ingresa los detalles para tu Cuenta</p>
            <input type="text" name="username" id="username" class="form-control" placeholder="Usuario" required />
            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required />
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar Contraseña" required />
            <button class="btn btn-lg btn-login btn-block" type="submit">Registrarse</button>
            <div class="registration">
                Estas Registrado.
                <a class="" href="/login">
                    Ingresa Aqui
                </a>
            </div>

        </div>

      {{ Form::close() }}

    </div>


    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="js/lib/jquery.js"></script>
    <script src="bs3/js/bootstrap.min.js"></script>

  </body>
</html>