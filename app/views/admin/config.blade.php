@extends('layouts.admin')

@section('content')

	<h1>Opciones de Configuracion</h1>
	<div class="alert alert-info">
		Formulario para hacer cambios en las opciones de configuracion, tales como cambiar IVA o porcentaje de descuento. 
	</div>
	<br>
	<section class="panel">
		<header class="panel-heading">
			<a href="{{ URL::previous() }}" class="btn btn-info"><i class="fa fa-angle-double-left"></i> Volver</a>	
			<span class="pull-right">
				Cambiar Opciones
			</span>
		</header>
		<div class="panel-body">
			<section id="config_edit">
				{{ Form::open(array('url' => '/admin/configuration'),array('class' => 'form-horizontal', 'role' => 'form')) }}

					@include ('common/errors', array('errors' => $errors))

					<div class="row">
						@foreach ($config as $config)
						<div class="form-group col-sm-12">
							{{ Form::label('config_value[]', strtoupper($config->config_name), array('class' => 'control-label col-sm-2') ) }}
							<div class="input-group col-sm-10">
								<span class="input-group-addon">%</span>
								{{ Form::text('config_value[]', $config->config_value, array('class' => 'form-control')) }}
							</div>
						</div>
						<br />
						@endforeach
					</div>
					{{ Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) }}    
			  
				{{ Form::close() }}
			</section>
		</div>
	</section>

@stop