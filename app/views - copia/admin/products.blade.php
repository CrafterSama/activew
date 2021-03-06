@extends('layouts.admin')

@section('title') Lista de Productos - Carioca ActiveWear @stop

@section('content')

	<h2>Lista de Productos</h2>
	<div class="alert alert-info">
		A continuación encontrara una Lista de los Productos Ingresados al Sistema. 
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
			Productos
	        <span class="tools pull-right">
	            <a href="/admin/productos/agregar" class="btn btn-success pull-right white"><i class="fa fa-plus fa-lg"></i>	Agregar Producto</a>	
	        </span>
	    </header>
	    <div class="panel-body">
	        <section id="no-more-tables">
	            <table class="table table-rounded table-striped table-condensed cf">
	            	<thead class="cf">
						<tr class="text-center">
							<th class="col-xs-2 text-center">Estampado</th>
							<th class="text-center">Modelo</th>							
							<th class="col-xs-1 text-center">Cantidad</th>
							<th class="col-xs-1 text-center visible-lg">Valor Unitario</th>
							<th class="col-xs-1 text-center visible-lg">Total Bs.</th>
							<th class="col-xs-2 text-center visible-lg">Fecha de Registro</th>
							<th class="col-xs-2 text-center">Acciones</th>
						</tr>
					</thead>
					<tbody class="text-center">
						@if (empty($products))
							<h4>Aun no hay Datos</h4>
						@else
							@foreach ($products as $product)
								<tr>
									<td class="col-xs-2" data-title="Estampado"><a href="/assets/images/stamps/{{ Stamp::getName($product->stamp_id) }}" class="img-thumbnail"><img src="/assets/images/stamps/{{ Stamp::getName($product->stamp_id) }}" alt="Estampado" width="150px" /></a><br /> </td>
									<td data-title="Modelo">{{ Stamp::getStampName($product->stamp_id).'<br />'.Modelo::getName($product->model_id) }}</td>
									<td data-title="Cantidad">{{ $product->amounts }}</td>
									<td class="visible-lg" data-title="Valor Unitario">Bs. {{  number_format(Modelo::getPrice($product->model_id), 2, ',', '.') }}</td>
									<td class="visible-lg" data-title="Total Bs.">Bs. {{  number_format($product->amounts*Modelo::getPrice($product->model_id), 2, ',', '.') }}</td>
									<td class="visible-lg" data-title="Fecha de Registro">{{ $product->created_at }}</td>
									<td data-title="Acciones" class="text-center">
										<a href="/admin/productos/{{ $product->id }}/editar" class="btn btn-warning btn-xs white"  data-toggle="tooltip" data-placement="top" title="Editar Registro"><i class="fa fa-pencil fa-lg"></i></a>
										<a href="{{ url('/admin/productos/borrar',$product->id) }}" class="btn btn-danger btn-xs white"  data-toggle="tooltip" data-placement="top" title="Borrar Registro" onclick="return confirm('¿Esta seguro que desea borrar este Registro?');"><i class="fa fa-trash-o fa-lg"></i></a>
									</td>
								</tr>
							@endforeach
						@endif
					</tbody>
	            </table>
	            {{ $products->links() }}
	        </section>
	    </div>
	</section>

@stop