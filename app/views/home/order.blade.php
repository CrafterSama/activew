@extends('layouts.home')

@section('title') Ordenes - ActiveWear @stop

@section('content')
<div class="main">
	<div class="container">
		<div class="row">
			@if(Session::has('notice'))
				<br />
				<div class="alert alert-success" style="font-size: 19px;">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ Session::get('notice') }}
				</div>
			@endif
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
									<th>Precio Unidad</th>
									<th>Sub-Total</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$no=0; 
									$discount = 0;
								?>
								@foreach($order->items as $item)
								<?php $no++;  ?>
								<tr>
									<td data-title="No.">{{ $no; }}. </td>
									<td data-title="Producto">
										<a href="/assets/images/stamps/{{ Stamp::getName($item->product->stamp_id) }}">
											<img src="/assets/images/stamps/{{ Stamp::getName($item->product->stamp_id) }}" class="cart-img img-thumbnail" alt="" width="90">
										</a>
										<br />
										{{ Stamp::getStampName($item->product->stamp_id) }}
										<br />
										({{ ucwords(strtolower(Modelo::getName($item->product->model_id))) }})
										</td>
										<td data-title="Cantidad"> 										
											<span class="badge cart-qty"> {{ $item->cantidad }} </span>
										</td>
										<td data-title="Precio Unidad">Bs. {{ number_format($item->precio, 2, ',', '.') }}</td>
										<td data-title="Sub-Total">Bs. {{ number_format($item->cantidad*$item->precio, 2, ',', '.') }}</td>
									</tr>
									<?php $discount += $item->cantidad; ?>
									@endforeach

									@if (($discount >= 12) && (Configuration::getDiscount() > 0) )
										<tr>
											<td colspan="4" class="cart-bottom visible-lg" style="text-align:right"><strong>Sub-Total:</strong></td>
											<td data-title="Total :">Bs. {{ number_format($order->total(), 2, ',', '.') }}</td>
										</tr>
										<tr>
											<td colspan="4" class="cart-bottom visible-lg" style="text-align:right"><strong>Descuento 30% :</strong></td>
											<td data-title="Descuento 30% :">Bs. {{ number_format($order->total()*Configuration::getDiscount(), 2,',','.') }}</td>
										</tr>
										<tr>
											<td colspan="1"></td>
											<td><strong>Descuento del 30% a partir de 12 Piezas</strong></td>
											<td colspan="2" class="cart-bottom visible-lg" style="text-align:right"><strong>Total :</strong></td>
											<td data-title="Total :">Bs. {{ number_format($order->total()-($order->total()*Configuration::getDiscount()), 2, ',', '.') }}</td>						
										</tr>
									@else
										<tr>
											<td colspan="4" class="cart-bottom visible-lg" style="text-align:right"><strong>Total :</strong></td>
											<td data-title="Total :">Bs. {{ number_format($order->total(), 2, ',', '.') }}</td>						
										</tr>
									@endif

									<tr>
										<td colspan="4" class="text-right bg1">
										</td>
										<td></td>
									</tr>							  
								</tbody>
							</table>
							<!-- Start cart action -->
							<div class="row">
								<div class="col-lg-12 bg2">

									@if(!$order->pago)
									<h3>Confirmar pago:</h3>
									<form action="/pay" method="post" enctype="multipart/form-data">
										<div class="col-lg-6">
											<div class="form-group">
												{{ Form::label('recibo','No. de transferencia o deposito') }} 
												{{ $errors->first('recibo', '<div class="alert alert-danger">:message</div>') }}
												<input name="recibo" type="number" value="{{ Input::old('recibo') }}" placeholder="No. de Recibo" class="form-control" rquired />
											</div>
											<div class="form-group">
												{{ Form::label('monto','Monto de la transferencia o deposito') }}
												{{ $errors->first('monto', '<div class="alert alert-danger">:message</div>') }}
												<div class="input-group">
													<span class="input-group-addon">Bs.</span>
													<input name="monto" value="{{ Input::old('monto') }}" placeholder="Monto en Bs." type="number" class="form-control" required />
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												{{ Form::label('fecha','Seleccione la Fecha de la transaccion') }}
												{{ $errors->first('fecha', '<div class="alert alert-danger">:message</div>') }}
												<input name="fecha" value="{{ Input::old('fecha') }}" type="date" class="form-control" required />
											</div>
											<div class="form-group">
												{{ Form::label('adjunto','Seleccione el Adjunto') }}
												{{ $errors->first('adjunto', '<div class="alert alert-danger">:message</div>') }}
												<input type="file" name="adjunto" placeholder="Imagen" class="form-control" required />
											</div>
										</div>
										<div class="col-lg-12">
										<?php $user = Auth::user(); ?>
										@if (strtolower(Municipio::getName($user->municipio)) == 'maracaibo')
											<div class="alert alert-success" style="font-size: 19px;">
												<p class="text-justify">
													De Acuerdo a nuestra Informacion, Tu lugar de Residencia es en Maracaibo, por lo tanto tu Pedido Debe Ser Retirado directamente en el Local de la Tienda Pioggia Di Mare.
												</p>
											</div>
										@else
											<p style="font-size: 19px;">¿Verifique muy bien si es esta la dirección a la desea que se envie su producto?</p>
											<div class="alert alert-success" style="font-size: 19px;">
												<p class="text-justify">
													<strong>Direccion de Entrega del Pedido:</strong><br />
													{{ User::getAddress(Auth::user()->id) }}
												</p>
											</div>
											{{ Form::label('options', 'Seleccione Si o No') }}
											<br />
											{{ Form::label('options', 'Si') }}
											<input type="radio" name="option" id="si" class="option" value="si" />
											{{ Form::label('options', 'No') }}
											<input type="radio" name="option" id="no" class="option" value="no" />
											<br />
											<div class="collapse">
												{{ Form::label('user_address', 'Nueva Dirección') }}
												<input type="text" name="user_address" value="" class="form-control col-lg-12" placeholder="Agregue su nueva Dirección" />
									            <div class="form-group">
									                <label for="estado">Estado</label>
									                <select name="estado" id="estado" class="form-control">
									                        <option>Seleccione...</option>
									                    @foreach ($states as $state)
									                        <option value="{{ $state->id }}">{{ ucwords(strtolower($state->nombre)) }}</option>
									                    @endforeach
									                </select>
									                <br />
									                <label for="municipio">Ciudad</label>
									                <select name="municipio" id="municipio" class="form-control">
									                        <option>Selecciona el Estado</option>
									                </select>
									            </div>
											</div>
											<br />
										@endif
											{{ Form::hidden('id', $order->id) }}
											<button type="submit" class="btn btn-lg btn-primary btn-block"> <i class="fa fa-check"></i> Confirmar</button>
										</div>
										<br />
										<br />
									</form>
									@else

									<div class="col-lg-6">
											<div class="form-group">
												{{ Form::label('recibo','No. de transferencia o deposito:') }} 
												{{ $order->pago->recibo }}
											</div>
											<div class="form-group">
												{{ Form::label('monto','Monto de la transferencia o deposito:') }}
												&nbsp;&nbsp;Bs.&nbsp;{{ number_format($order->pago->monto, 2, ',', '.') }}
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												{{ Form::label('fecha','Fecha de la transaccion: ') }}
												{{ $order->pago->fecha }}
											</div>
											<div class="form-group">
												{{ Form::label('adjunto','Adjunto') }}
												<a href="/{{ $order->pago->adjunto }}" target="_popup">ADJUNTO</a>
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