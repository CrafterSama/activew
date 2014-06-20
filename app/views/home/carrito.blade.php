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
						@if(count($cart) > 0)

						<table class="table table-rounded table-striped table-condensed cf">
							<thead class="cf">
								<tr>
									<th>No</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio</th>
									<th>Eliminar</th>
								</tr>
							</thead>

							<tbody>
								<?php $no=0; ?>
								@foreach($cart as $item)
								<?php $no++; ?>
								<tr>
									<td>{{ $no; }}. </td>
									<td>
										<a href="#"><img src="/assets/images/stamps/{{ $item->options->image }}" class="cart-img" alt="" width="80"></a>
										<a href="#" class="item-name">{{ $item->name }}</a>
									</td>
									<td> 
										<a href="/cart/minus/{{ $item->rowid }}" class="cart-change minus"> 
											<i class="fa fa-minus fa-lg"></i> 
										</a> 
										<span class="badge cart-qty"> {{ $item->qty }} </span>
										
										<a href="/cart/plus/{{ $item->rowid }}" class="cart-change plus">
											<i class="fa fa-plus fa-lg"></i> 
										</a> 
									</td>
									<td>{{ $item->price }} Bs </td>
									<td>
										<a href="/cart/remove/{{ $item->rowid }}" class="cart-remove">
											<i class="fa fa-trash-o fa-lg"></i> 
										</a>
									</td>
								</tr>
								@endforeach

								<tr>
									<td colspan="4" class="cart-bottom" style="text-align:right"><strong>Subtotal :</strong></td>
									<td> {{ Cart::total(); }} Bs.</td>													
								</tr>

								<tr>
									<td colspan="4" class="text-right bg1">
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
						<h2 align="center">No hay productos en tu carrito de compras :(</h2>
						@endif
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
@stop