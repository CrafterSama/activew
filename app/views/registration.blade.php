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
            {{ Form::text('full_name', Input::old('full_name'), array('class' => 'form-control','placeholder' => 'Nombre Completo')); }}
            {{ Form::email('email', Input::old('email'), array('class' => 'form-control','placeholder' => 'Correo Electronico')); }}
            <p> Ingresa los detalles para tu Cuenta</p>
            {{ Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder' => 'Usuario')); }}
            {{ Form::password('password', array('class' => 'form-control','placeholder' => 'Contraseña')); }}
            {{ Form::password('password_confirm', array('class' => 'form-control','placeholder' => 'Re-ingresa Contraseña')); }}
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