@extends('layouts.home')

@yield('title')
	
	Formulario de Contactos

@stop

@section('content')

<div class="row">
	<div class="col-sm-4">
		<h3>Consiguenos a traves de</h3>
		<hr>
		<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2039.5015714102315!2d-71.62405926903214!3d10.676972181440055!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses-419!2s!4v1399666152409" width="100%" height="180" frameborder="0" style="border:0"></iframe>
		<address>
			<strong><span class="adresspoint"></span> Direccion:</strong> Urbanización Juana de Avila calle 66A #15A-25. Maracaibo, Edo. Zulia, Venezuela<br><br>
			<strong><span class="email"></span> Correo Electronico:</strong> <a href="mailto:#">info@pioggiadimare.com</a><br><br>
			<strong><span class="phone"></span> Telefono:</strong> (555)123-4567
		</address>

	</div>
	    
	<div class="col-sm-8 contact-form">
		<h3>Formulario de Contacto</h3>
		<hr>
		<form id="contact" method="post" class="form" role="form">
			<div class="row">
				<div class="col-xs-6 col-md-6 form-group">
					{{ Form::text('name','', array('placeholder'=>'Nombre...','class'=>'form-control','id'=>'name','required'=>'')) }}
				</div>
				<div class="col-xs-6 col-md-6 form-group">
					{{ Form::email('email','', array('placeholder'=>'jdoe@unknow.com','class'=>'form-control','id'=>'email','required'=>'')) }}
				</div>
			</div>
			{{ Form::textarea('message', '', array('placeholder'=>'Mensaje...','rows'=>'5','class'=>'form-control', 'id'=>'message')) }}
			<br />
			<div class="row">
				<div class="col-xs-12 col-md-12 form-group">
					{{ Form::submit('Enviar',array('class'=>'btn btn-primary pull-right')) }}
				</div>
			</div>
		</form>
	</div>
</div>
<div class="blank"></div>
@stop