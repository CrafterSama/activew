@extends ('layouts.admin')

<?php

    if ($user->exists):
        $form_data = array('url' => 'admin/usuarios/'.$user->id.'/editar', 'method' => 'POST');
        $action    = 'Editar';
        $frase 	   = 'al usuario <span class="label label-info label-lg"><a href="/admin/usuarios/'.$user->id.'/perfil"><i class="fa fa-anchor"></i> '.$user->full_name.'</a></span>';
    else:
        $form_data = array('url' => 'admin/usuarios/agregar', 'method' => 'POST');
        $action    = 'Crear';
        $frase     = 'un Usuario';    
    endif;

?>

@section ('title') {{ $action }} Usuarios @stop

@section ('content')

	<h1>{{ $action }} Usuarios</h1>
	<div class="alert alert-info">
		A Continuacion encontrara un formulario para {{ $action }} {{ $frase }}.
	</div>
	<br>
	<section class="panel">
		<header class="panel-heading">
			<a href="/admin/usuarios" class="btn btn-info"><i class="fa fa-angle-double-left"></i> Volver</a>	
			<span class="pull-right">
				{{ $action }} Usuarios
			</span>
		</header>
		<div class="panel-body">
			<section id="{{ strtolower($action) }}_usuario">
				{{ Form::model($user, $form_data, array('role' => 'form')) }}

					@include ('common/errors', array('errors' => $errors))

					<div class="row">
						<div class="form-group col-md-4">
							{{ Form::label('username', 'Nombre de Usuario') }}
							{{ Form::text('username', null, array('placeholder' => 'Introduce el Nombre de Usuario', 'class' => 'form-control')) }}
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('email', 'Correo Electronico') }}
							{{ Form::text('email', null, array('placeholder' => 'Correo Electronico', 'class' => 'form-control')) }}
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('full_name', 'Nombre completo') }}
							{{ Form::text('full_name', null, array('placeholder' => 'Nombre y Apellido', 'class' => 'form-control')) }}        
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							{{ Form::label('role_id', 'Tipo de Usuario') }}
							<select name="role_id" id="role_id" class="form-control"><option value="1">Administrador</option><option value="2">Usuario</option></select>       
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