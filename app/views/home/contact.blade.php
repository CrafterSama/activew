@extends('layouts.home')

@section('title') Contactenos - ActiveWear @stop

@yield('title')

	Formulario de Contactos

@stop

@section('content')
	<div class="main">
		<div class="container">
			<br />
			     <div class="row clearfix">
                    <div class="col-md-4 column">
                            <img src="/../assets/images/banner_contactos.jpg" alt="Contactos" class="banner_top">
                    </div>
                    <div class="col-md-2 column">

                    </div>
                    <div class="col-md-4 column">
                           <div class="quote"><strong>No olvides seguirnos en nuestras redes sociales <br /> #CariocaActiveWear</strong></div>
                    </div>
                    <div class="col-md-2 column">
                            <img src="/../assets/images/Icono3.png" width='100%' align="right">
                    </div>
                 </div>
	                <div class="contact_form">
						<div class="col-sm-5">
						    <img src="/../assets/images/modelo_activewear.jpg" alt="acerca de" class="banner_top">
						</div>
						<div class="col-sm-7 contact-form">
							<form id="contact" method="post" class="form" role="form">
								<div class="row">
									<div class="col-xs-10 col-md-10 form-group input-group">
										{{ Form::text('name','', array('placeholder'=>'Nombre...','class'=>'form-control bggray','id'=>'name','required'=>'')) }}
										<span class="input-group-addon bggray"><i class="fa fa-user fa-fw"></i></span>
									</div>
									<div class="col-xs-10 col-md-10 form-group input-group">
										{{ Form::email('email','', array('placeholder'=>'Email...','class'=>'form-control bggray','id'=>'email','required'=>'')) }}
										<span class="input-group-addon bggray"><i class="fa fa-envelope-o fa-fw"></i></span>
									</div>
								    <div class="col-xs-10 col-md-10 form-group input-group">
										{{ Form::textarea('message', '', array('placeholder'=>'Mensaje...','rows'=>'6','class'=>'form-control bggray','id'=>'message')) }}
										<span class="input-group-addon bggray"></span>
								    </div>
								</div>
								<div class="row">
									<div class="col-xs-10 col-md-10 form-group">
										{{ Form::submit('Enviar',array('class'=>'btn btn-primary pull-right, bgviolet')) }}
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
		</div>
	</div>
	<br />
	<br />
@stop
