<!doctype html>

<html lang="es">

<head>

	<meta charset="UTF-8">

	<title>Factura</title>

</head>

<body style="font-family: sans-serif; background-color: #f2f2f2; margin: 0; color: #333;"> 

	<div style="width: 100%; background-color: #C74751; padding: 0.3em; text-align: center; border-bottom: 3px solid #8D2C33;">

		<img src="http://pioggia.craftersama.me/assets/images/logo.png" alt="">

	</div>



	<div style="padding: 0 1em;"> 

		<h1>Recibo de Pago No. {{ $factura['id'] }} a la Compra</h1>

		<hr>



		<p><strong>Recibo:</strong> {{ $pago['recibo'] }} </p>

		<p><strong>Monto:</strong> {{ $pago['monto'] }} </p>

		<p><strong>Fecha:</strong> {{ $pago['fecha'] }}</p>


		<h1>Recibo No. {{ $factura['id'] }} </h1>

		<hr>



		<h4>Detalles del Recibo: </h4>



		<p><strong>Nombre:</strong> {{ $user['full_name'] }} </p>

		<p><strong>Correo:</strong> {{ $user['email'] }} </p>
	

		<hr/>

		<h4>Compra: </h4>



		<table border="0" width="100%" style="border: 1px solid #fff ; text-align: center;">

			<tr>

				<th style="background-color: #C74751; color:#fff;">Producto</th>

				<th style="background-color: #C74751; color:#fff;">Cantidad</th>

				<th style="background-color: #C74751; color:#fff;">Precio</th>

				<th style="background-color: #C74751; color:#fff;">Subtotal</th>

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

			<a href="http://pioggia.craftersama.me/order/{{ $factura['id'] }}" style="font-size: 28px;  background-color: #C74751; color: #ecf0f1; text-decoration: none; padding: .2em; border-bottom: 3px solid #8D2C33; margin: 0 auto; border-radius: 5px;"> Ver en linea </a>

		</div>

	</div>

	

</body>

</html>