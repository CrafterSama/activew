@extends ('layouts.admin')

<?php

    if ($user->exists):
        $form_data = array('url' => 'admin/usuarios/'.$user->id.'/editar', 'method' => 'POST');
        $action    = 'Editar';
        $frase 	   = 'al usuario <strong><a href="/admin/usuarios/'.$user->id.'/perfil" class="btn-link"><i class="fa fa-chain"></i> '.$user->full_name.'</a></strong>';
    else:
        $form_data = array('url' => 'admin/usuarios/agregar', 'method' => 'POST');
        $action    = 'Crear';
        $frase     = 'un Usuario';    
    endif;

?>

@section ('title') {{ $action }} usuarios @stop

@section ('content')

	<h1>{{ $action }} usuarios</h1>
	<div class="alert alert-info">
		A continuacion encontrara un formulario para {{ strtolower($action) }} {{ strtolower($frase) }}.
	</div>
	<br>
	<section class="panel">
		<header class="panel-heading">
			<a href="{{ URL::previous() }}" class="btn btn-info"><i class="fa fa-angle-double-left"></i> Volver</a>	
			<span class="pull-right">
				{{ $action }} usuarios
			</span>
		</header>
		<div class="panel-body">
			<section id="{{ strtolower($action) }}_usuario">
				{{ Form::model($user, $form_data, array('role' => 'form')) }}

					@include ('common/errors', array('errors' => $errors))

					<div class="row">
						<div class="form-group col-md-4">
							{{ Form::label('username', 'Nombre de Usuario') }}
							{{ Form::text('username', null, array('placeholder' => 'Introduce el Nombre de Usuario', 'class' => 'form-control'), 'readonly') }}
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('email', 'Correo Electronico') }}
							{{ Form::text('email', null, array('placeholder' => 'Correo Electronico', 'class' => 'form-control')) }}
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('full_name', 'Nombre completo') }}
							{{ Form::text('full_name', null, array('placeholder' => 'Nombre y Apellido', 'class' => 'form-control')) }}        
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('user_address', 'Direccion') }}
							<div class="alert alert-info">Debe guardar aqui la direccion a la cual recibe los pedidos, coloque al final la Ciudad y el Estado</div>
							{{ Form::text('user_address', null, array('placeholder' => 'Direccion', 'class' => 'form-control')) }}        
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('user_mobile', 'Numero Telefonico o Movil') }}
							<div class="alert alert-info">Ingrese su Numero de telefono o movil para efectos de comunicación</div>
							{{ Form::text('user_mobile', null, array('placeholder' => 'Telefono', 'class' => 'form-control')) }}        
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							{{ Form::label('role_id', 'Tipo de Usuario') }}
							{{ Form::select('role_id', $options, $user->role_id, array('class'=>'form-control')) }}      
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('password', 'Contraseña') }}
							{{ Form::password('password', array('class' => 'form-control')) }}
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('password_confirmation', 'Confirmar contraseña') }}
							{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
						</div>
					</div>
					{{ Form::button($action . ' usuario', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) }}    
			  
				{{ Form::close() }}
			</section>
		</div>
	</section>

@stop