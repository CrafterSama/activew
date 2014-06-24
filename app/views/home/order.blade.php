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
									@if(!$order->pago())
									<h3>Confirmar pago:</h3>
									<form action="/pay" method="post" enctype="multipart/form-data">
										<div class="col-lg-6">
											<div class="form-group">
												{{ Form::label('recibo','No. de transferencia o deposito') }} 
												{{ $errors->first('recibo', '<div class="alert alert-danger">:message</div>') }}
												{{ Form::text('recibo', Input::old('recibo'), array('class'=>'form-control', 'placeholder'=>'123456789',)) }}
											</div>
											<div class="form-group">
												{{ Form::label('monto','Monto de la transferencia o deposito') }}
												{{ $errors->first('monto', '<div class="alert alert-danger">:message</div>') }}
												{{ Form::text('monto', Input::old('monto'), array('class'=>'form-control', 'placeholder'=>'Monto en Bs.',)) }}
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												{{ Form::label('fecha','Seleccione la Fecha de la transaccion') }}
												{{ $errors->first('fecha', '<div class="alert alert-danger">:message</div>') }}
												{{ Form::text('fecha', Input::old('fecha') , array('class'=>'form-control', 'placeholder'=>'dd/mm/aaaa',)) }}
											</div>
											<div class="form-group">
												{{ Form::label('adjunto','Seleccione el Adjunto') }}
												{{ $errors->first('adjunto', '<div class="alert alert-danger">:message</div>') }}
												{{ Form::file('adjunto', null , array('class'=>'form-control', 'placeholder'=>'imagen.jpg',)) }}
											</div>
										</div>
										{{ Form::hidden('id', $order->id) }}
										<button type="submit" class="btn btn-lg btn-primary pull-right"> <i class="fa fa-check"></i> Confirmar</button>
									</form>
									@else

									<div class="col-lg-6">
											<div class="form-group">
												{{ Form::label('recibo','No. de transferencia o deposito:') }} 
												{{ $order->pago->recibo }}
											</div>
											<div class="form-group">
												{{ Form::label('monto','Monto de la transferencia o deposito:') }}
												{{ $order->pago->monto }}
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												{{ Form::label('fecha','Fecha de la transaccion: ') }}
												{{ $order->pago->fecha }}
											</div>
											<div class="form-group">
												{{ Form::label('adjunto','Adjunto') }}
												<a href="{{ $order->pago->adjunto }}" target="_blank">Ver</a>
											</div>
										</div>

									@endif
								</div>		
							</div>
							<!-- End cart action -->
							@else
							<br/>
							<h2 align="center">No hay productos en esta orden :(</h2>
							@endif
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
	@stop