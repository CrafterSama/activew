@extends('layouts.home')

@section('content')
<div class="main">
    <div class="container">
        <div class="row">
			<br />
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
			        <section id="no-more-tables">
		            	<table class="table table-rounded table-striped table-condensed cf">
		            		<thead class="cf">
								<tr>
									<th class="col-md-6">No de Orden</th>
									<th class="col-md-2 text-center">Producto</th>
									<th class="col-md-2 text-center">Cantidades</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($orders as $order)
								<tr>
									<td>
										{{ $order->id }}
									</td>
									<td>
										{{ $order->id }}
									</td>
									<td>
										{{ Form::model($order, array('url' => '/cesta/agregar','role'=>'form')) }}
				                            <input type="number" name="quantities" value="{{ ProdToOrder::getQty($order->id) }}" min="1" max="" class="form-control" />
                        				{{ Form::close() }}
                        			</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</section>
                </div>
            </div>
	    </div>
    </div>
</div>
@stop