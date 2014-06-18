@extends ('layouts.admin')

<?php

    if ($product->exists):
        $form_data = array('url' => 'admin/productos/'.$product->id.'/editar','role'=>'form', 'files'=>true);
        $action    = 'Editar';
    else:
        $form_data = array('url' => 'admin/productos/agregar','role'=>'form', 'files'=>true);
        $action    = 'Agregar';        
    endif;

?>

@section ('title') {{ $action }} productos @stop

@section ('content')

	<h1>{{ $action }} Productos</h1>
	<div class="alert alert-info">
		Formulario para {{ strtolower($action) }} los productos en el sistema. 
	</div>
	<br>
	<section class="panel">
		<header class="panel-heading">
			<a href="/admin/productos" class="btn btn-info"><i class="fa fa-angle-double-left"></i> Volver</a>	
			<span class="pull-right">
				{{ $action }} Productos 
			</span>
		</header>
		<div class="panel-body">
			<section id="{{ strtolower($action) }}_modelos">
				@if ($action == 'Agregar')
					{{ Form::model($product, $form_data) }}
						@include ('common/errors', array('errors' => $errors))
						<div class="row">
							<div class="form-group col-md-4" >
								<h4>Nombre e Imagen del Producto</h4>
								<hr />
								{{ Form::label('stampname','Nombre del Estampado') }}
								{{ Form::text('stampname','',array('placeholder'=>'Nombre del Estampado','class'=>'form-control')) }}
								<br />
					        	<input type='file' id="imgInp" name="stamp" class="file" /><br />
						        <div class="thumbnail">
		        					<img id="target" src="#" alt="Estampado" class="img-responsive" />
								</div>
							</div>
							<div class="form-group col-md-6">
								<h4>Modelos</h4>
								<hr />
								@foreach ($modelos as $modelo)
									{{ Form::label($modelo->model_name, strtoupper($modelo->model_name)) }}
									{{ Form::checkbox('model_id['.$modelo->id.']',$modelo->id) }}
									<input type="number" min="1" name="amounts_{{ $modelo->id }}" placeholder="Cantidades" class="form-control" />
									<br />
								@endforeach
							</div>
						</div>
						{{ Form::submit('Guardar', array('class'=>'btn btn-primary pull-right')) }}
					{{ Form::close() }}
				@else
					{{ Form::model($product, $form_data) }}
						@include ('common/errors', array('errors' => $errors))
						<div class="row">
							<div class="form-group col-md-4">
								{{ Form::label(Modelo::getName($product->model_id), strtoupper(Modelo::getName($product->model_id))) }}
								<input type="number" min="1" name="amounts" class="form-control">
							</div>
						</div>
						{{ Form::submit('Guardar', array('class'=>'btn btn-primary pull-right')) }}
					{{ Form::close() }}
				@endif
			</section>
		</div>
	</section>
@stop