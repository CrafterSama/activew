<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
</head>
<body style="font-family: sans-serif; background-color: #353637; margin: 0; color: #ecf0f1;"> 
	<div style="width: 100%; background-color: #de2824; padding: 1em; text-align: center; border-bottom: 5px solid #c0392b;">
		<img src="http://joelblackberryzone.com.ve/img/logo.png" alt="">
	</div>

	<div style="padding: 0 1em;"> 

		<h1>Pago a la factura N# {{ $factura['id'] }} </h1>
		<hr>

		<p><strong>Recibo:</strong> {{ $pago['recibo'] }} </p>
		<p><strong>Monto:</strong> {{ $pago['monto'] }} </p>
		<p><strong>Fecha:</strong> {{ $pago['fecha'] }}</p>
		<p><strong>Adjunto:</strong> <a href="http://joelblackberryzone.com.ve/{{ $pago['adjunto'] }}" style="font-size: 18px; background-color: #de2824; color: #ecf0f1; text-decoration: none; padding: .2em; border-bottom: 5px solid #c0392b; margin: 0 auto;">ENLACE</a> </p>


		<h1>Factura N# {{ $factura['id'] }} </h1>
		<hr>

		<h4>Datos de facturación: </h4>

		<p style="text-decoration:none;"><strong>Nombre:</strong> {{ $factura['nombre'] }} </p>
		<p style="text-decoration:none;"><strong>Teléfono:</strong> {{ $factura['telefono'] }} </p>
		<p style="text-decoration:none;"><strong>Correo:</strong> {{ $factura['correo'] }}</p>
		<p style="text-decoration:none;"><strong>Dirección:</strong> {{ $factura['direccion'] }} </p>
	
		<hr/>
		<h4>Compra: </h4>

		<table border="0" width="100%" style="border: 1px solid #fff ; text-align: center;">
			<tr>
				<th style="background-color: black;">Producto</th>
				<th style="background-color: black;">Cantidad</th>
				<th style="background-color: black;">Precio</th>
				<th style="background-color: black;">Subtotal</th>
			</tr>
			<?php $total = 0; ?>
			@foreach ($items as $item)
			<tr>
				<td style="border: 1px solid #fff ;">{{ substr($item['keep'], 0, strpos($item['keep'], '|')) }}</td>
				<td style="border: 1px solid #fff ;">{{ $item['cantidad'] }}</td>
				<td style="border: 1px solid #fff ;">{{ $item['precio'] }} Bs.</td>
				<td style="border: 1px solid #fff ;">{{ $item['cantidad']*$item['precio'] }} Bs.</td>
			</tr>
			<?php $total += $item['cantidad'] * $item['precio']; ?>
			@endforeach

		</table>
		<h4 align="right">Total: {{ $total }} Bs. </h4>
	
		<div align="center">
			<a href="http://joelblackberryzone.com.ve/factura/{{ $factura['slug'] }}" style="font-size: 28px; background-color: #de2824; color: #ecf0f1; text-decoration: none; padding: .6em; border-bottom: 5px solid #c0392b; margin: 0 auto;"> Ver en linea </a>
		</div>
	</div>
	
</body>
</html>