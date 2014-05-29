@extends ('layouts.admin')

<?php

    if ($modelo->exists):
        $form_data = array('url' => 'admin/modelos/'.$modelo->id.'/editar', 'method' => 'POST');
        $action    = 'Editar';
    else:
        $form_data = array('url' => 'admin/modelos/agregar', 'method' => 'POST');
        $action    = 'Agregar';        
    endif;

?>

@section ('title') {{ $action }} Modelos @stop

@section ('content')

	<h1>{{ $action }} Modelos</h1>
	<div class="alert alert-info">
		Formulario para {{ $action }} los Modelos de los Productos al Sistema. 
	</div>
	<br>
	<section class="panel">
		<header class="panel-heading">
			<a href="/admin/modelos" class="btn btn-info"><i class="fa fa-angle-double-left"></i> Volver</a>	
			<span class="pull-right">
				{{ $action }} Modelos 
			</span>
		</header>
		<div class="panel-body">
			<section id="{{ strtolower($action) }}_modelos">
				{{ Form::model($modelo, $form_data, array('role' => 'form')) }}

					@include ('common/errors', array('errors' => $errors))

					<div class="row">
						<div class="form-group col-md-4">
							{{ Form::label('model_name', 'Nombre del Modelo') }}
							{{ Form::text('model_name', null, array('placeholder' => 'Introduce el Nombre del Modelo', 'class' => 'form-control')) }}
						</div>
						<div class="form-group col-md-4">
							{{ Form::label('price_out_tax_float', 'Precio Normal') }}
							{{ Form::text('price_out_tax_float', null, array('placeholder' => '0000.00', 'class' => 'form-control')) }}
						</div>
					</div>
					{{ Form::button($action . ' modelo', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) }}    
			  
				{{ Form::close() }}
			</section>
		</div>
	</section>

@stop