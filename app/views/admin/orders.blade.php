@extends('layouts.admin')

@section('content')

	<h2>Lista de Pedidos</h2>
	<div class="alert alert-info">
		A continuación encontrara una lista de los pedidos en el sistema. 
	</div>
	<br>
	<section class="panel">
	    <header class="panel-heading">
	    	<span class="visible-lg pull-left">Pedidos</span>
	        <span class="tools text-right">
	            <a href="/admin/pedidos/agregar" class="btn btn-success pull-right white"><i class="fa fa-plus fa-lg"></i>  Agregar Orden</a>
	            &nbsp;&nbsp;
	            <a href="/admin/usuarios" class="btn btn-success pull-right white"><i class="fa fa-users fa-lg"></i>  Usuarios</a>
	        </i>
	    </header>
	    <div class="panel-body">
	        <section id="no-more-tables">
	            <table class="table table-striped table-condensed cf">
	            	<thead class="cf">
						<tr>
							<th class="col-xs-1 text-center">Nº de Orden</th>
							<th class="text-center">Usuario</th>
							<th class="text-center">Producto</th>
							<th class="text-center">Cantidad</th>
							<th class="col-xs-2 text-center">Fecha de la Orden</th>
							<th class="col-xs-3 text-center">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($items as $item)
							<tr class="text-center">
								<td data-title="Nº de Recibo">{{ $item->id }}</td>
								<td data-title="Usuario"><a href="/admin/usuarios/{{ $item->factura->user_id }}/perfil" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Ver Datos del Usuario">{{ User::getName($item->factura->user_id) }}</a></td>
								<td data-title="Producto"><img class="img-thumbnail" src="/assets/images/stamps/{{ Stamp::getName($item->product->stamp_id) }}" class="cart-img" alt="" width="80"></a> {{ Stamp::getStampName($item->product->stamp_id) }}</td>
								<td data-title="Cantidad">{{ $item->cantidad }}</td>
								<td data-title="Fecha de la Orden">{{ Helper::getDate(strtotime($item->created_at,0)) }}</td>
								<td data-title="Acciones" class="text-center">
									<a href="" class="btn btn-success btn-xs white"  data-toggle="tooltip" data-placement="top" title="Aprovar Pedido"><i class="fa fa-check fa-lg"></i></a>
									<a href="" class="btn btn-warning btn-xs white"  data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil fa-lg"></i></a>
									<a href="" class="btn btn-danger btn-xs white"  data-toggle="tooltip" data-placement="top" title="Borrar Registro"><i class="fa fa-trash-o fa-lg"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
	            </table>
	        </section>
	    </div>
	</section>
@stop