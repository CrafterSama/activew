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
						@if(count($order) > 0)

						<table class="table table-rounded table-striped table-condensed cf">
							<thead class="cf">
								<tr>
									<th>No</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio</th>
								</tr>
							</thead>

							<tbody>
								<?php $no=0; ?>
								@foreach($order->items as $item)
								<?php $no++;  ?>
								<tr>
									<td data-title="No.">{{ $no; }}. </td>
									<td data-title="Producto">
										<a href="#">
											<img src="/assets/images/stamps/{{ Stamp::getName($item->product->stamp_id) }}" class="cart-img" alt="" width="80"></a>
										<a href="#" class="item-name">{{ $item->name }}</a>
									</td>
									<td data-title="Cantidad"> 										
										<span class="badge cart-qty"> {{ $item->cantidad }} </span>
									</td>
									<td data-title="Precio">Bs. {{ $item->precio }}</td>
									
								</tr>
								@endforeach

								<tr>
									<td colspan="3" class="cart-bottom visible-lg" style="text-align:right"><strong>Sub-Total :</strong></td>
									<td data-title="Sub-Total :">Bs. {{ $order->total(); }}</td>													
								</tr>

								<tr>
									<td colspan="3" class="text-right bg1">
									</td>
									<td></td>
								</tr>							  
							</tbody>
						</table>

						
						<!-- Start cart action -->
						<div class="row">
							<div class="col-lg-12 bg2">
								<form action="/pagar">
									<input type="text">
								</form>
								<a href="/procesar" class="btn btn-lg btn-primary pull-right"> <i class="fa fa-check"></i> Procesar compra</a>
							</div>		
						</div>
						<!-- End cart action -->
						@else
						<br/>
						<h2 align="center">No hay productos en tu carrito de compras :(</h2>
						@endif
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
@stop