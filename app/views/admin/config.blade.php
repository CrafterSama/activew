@extends('layouts.admin')

@section('content')

	<h1>Opciones de Configuracion</h1>
	<div class="alert alert-info">
		Formulario para hacer cambios en las opciones de configuracion, tales como cambiar IVA o porcentaje de descuento. 
	</div>
	<br>
	@if(Session::has('notice'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('notice') }}
	</div>
	<br>
	@endif
	<section class="panel">
		<header class="panel-heading">
			<a href="{{ URL::previous() }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Volver</a>	
			<span class="pull-right">
				Cambiar Opciones
			</span>
		</header>
		<div class="panel-body">
			<section id="config_edit">
				{{ Form::open(array('url' => '/admin/configuracion','class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'onsubmit'=>'return validation(this)')) }}

					@include ('common/errors', array('errors' => $errors))

					<div class="row">
						@foreach ($config as $config)
						<div class="form-group col-sm-12">
						<script>
							//Validar que el campo de formulario contenga sólo números
							function validacion(f)  {
								if (isNaN(f.campo_a_validar.value)) {
									alert("Error:\nEste campo debe tener sólo números.");
									f.{{ $config->config_name }}.focus();
									return (false);
						 		}
							}		
						</script>
							{{ Form::label($config->config_name, strtoupper($config->config_name), array('class' => 'control-label col-sm-2') ) }}
							<div class="input-group col-sm-10">
								<span class="input-group-addon">%</span>
								<input name="{{ $config->config_name }}" type="text" value="{{ $config->config_value }}" class="form-control" required />
							</div>
							<div class="col-sm-2">
								Vista Previa
							</div>
							<div class="col-sm-10">
								{{ $config->config_value }}
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