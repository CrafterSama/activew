@extends('layouts.admin')    

@section('content')
	<h2>Perfil del Usuario {{ $user->full_name }}</h2>
	<div class="alert alert-info">
		A continuación encontrara una Pequeña ficha con los Datos del Usuario del Cual esta Consultando el Perfil. 
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
			<a href="/admin/usuarios" class="btn btn-info"><i class="fa fa-angle-double-left"></i>  Volver</a>
			&nbsp;
			&nbsp;
			<span class="dropdown">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				Acciones <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
                    <li><a href="/admin/usuarios/{{ $user->id }}/editar"><i class="fa fa-pencil"></i> Editar</a></li>
                    <li><a href="/admin/usuarios/{{ $user->id }}/borrar"><i class="fa fa-trash-o"></i> Borrar</a></li>
				</ul>
			</span>
	        <span class="tools pull-right">
				<span class="visible-lg pull-right">{{ $user->full_name }}</span>
	        </span>

	    </header>
	    <div class="panel-body">
	        <section id="no-more-tables">
		    <table class="table table-bordered table-striped table-condensed cf">
				<tr>
					<td class="visible-lg"><strong>Username</strong></td><td data-title="Username"> {{ ($user->username) }} </td>
				</tr>
				<tr>
					<td class="visible-lg"><strong>Nombre Real</strong></td><td data-title="Nombre Real"> {{ $user->full_name }} </td>
				</tr>
				<tr>
					<td class="visible-lg"><strong>Email</strong></td><td data-title="Correo Electronico"> {{ $user->email }} </td>
				</tr>
				<tr>
					<td class="visible-lg"><strong> Nivel</strong></td><td data-title="Rol de Usuario"> {{ $rol->role_name }} </td>
				</tr>
		    </table>
	        </section>
	    </div>
	</section>
@stop