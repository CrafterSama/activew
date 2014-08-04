@extends('layouts.home')

@section('title') Carrito de Compras - ActiveWear @stop

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
						@if(count($cart) > 0)

						<table class="table table-rounded table-striped table-condensed cf">
							<thead class="cf">
								<tr>
									<th>No</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio Unidad</th>
									<th>Sub-total</th>
									<th>Eliminar</th>
								</tr>
							</thead>

							<tbody>
								<?php $discount=0; ?>
								<?php $no=0; ?>
								@foreach($cart as $item)
								<?php $no++; ?>
								<tr>
									<td data-title="No.">{{ $no; }}. </td>
									<td data-title="Producto">
										<a href="#"><img src="/assets/images/stamps/{{ $item->options->image }}" class="cart-img" alt="" width="80"></a>
										<a href="#" class="item-name">{{ $item->name }}</a>
									</td>
									<td data-title="Cantidad"> 
										<a href="/cart/minus/{{ $item->rowid }}" class="cart-change minus"> 
											<i class="fa fa-minus fa-lg"></i> 
										</a> 
										<span class="badge cart-qty"> {{ $item->qty }} </span>
										
										<a href="/cart/plus/{{ $item->rowid }}" class="cart-change plus">
											<i class="fa fa-plus fa-lg"></i> 
										</a> 
									</td>
									<td data-title="Precio Unidad">Bs. {{ number_format($item->price, 2, ',', '.') }}</td>
									<td data-title="Sub-total">Bs. {{ number_format($item->qty*$item->price, 2, ',', '.') }}</td>
									<td data-title="Eliminar">
										<a href="/cart/remove/{{ $item->rowid }}" class="cart-remove">
											<i class="fa fa-trash-o fa-lg"></i> 
										</a>
									</td>
								</tr>
								<?php $discount += $item->qty; ?> 
								@endforeach

								@if(($discount >= 12) && (Configuration::getDiscount() > 0))
									<tr>
										<td colspan="5" class="cart-bottom visible-lg" style="text-align:right"><strong>Sub-Total :</strong></td>
										<td data-title="Sub-Total :">Bs. {{ number_format(Cart::total(), 2, ',', '.') }}</td>
									</tr>
									<tr>
										<td colspan="5" class="cart-bottom visible-lg" style="text-align:right"><strong>Descuento 30% :</strong></td>
										<td data-title="Descuento 30% :" style="color:red;">Bs. {{ number_format(Cart::total()*Configuration::getDiscount(), 2,',','.') }}</td>
									</tr>
									<tr>	
										<td colspan="1" class="cart-bottom visible-lg"></td>
										<td><strong>Descuento del 30% a partir de 12 Piezas</strong></td>
										<td colspan="3" class="cart-bottom visible-lg" style="text-align:right"><strong>Total :</strong></td>
										<td data-title="Total :">
											Bs. {{ number_format(Cart::total() - (Cart::total()*Configuration::getDiscount()), 2, ',', '.'); }}
										</td>													
									</tr>
								@else
									<tr>	
										<td colspan="5" class="cart-bottom visible-lg" style="text-align:right"><strong>Total :</strong></td>
										<td data-title="Sub-Total :">
											Bs. {{ number_format(Cart::total(), 2, ',', '.') }}
										</td>													
									</tr>
								@endif


								<tr>
									<td colspan="5" class="text-right bg1">
									</td>
									<td></td>
								</tr>							  
							</tbody>
						</table>

						<!-- Start cart action -->
						<div class="row">
							<div class="col-lg-12 bg2 cart-action">
								<a href="/procesar" class="btn btn-lg btn-primary pull-right"> <i class="fa fa-check"></i> Procesar compra</a>
							</div>		
						</div>
						<!-- End cart action -->
						@else
						<br/>
						<h2 class="text-center">No hay productos en tu carrito de compras</h2>
						<br />
						<div class="text-center">
							<button class="btn btn-success btn-lg" onclick="location.href='productos'">Visita Nuestros Productos</button>
						</div>

						@endif
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
@stop