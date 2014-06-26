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

		<h1>Factura N# {{ $datos['id'] }} </h1>

		<hr>



		<h4>Datos de facturación: </h4>



		<p><strong>Nombre:</strong> {{ $datos['nombre'] }} </p>

		<p><strong>Teléfono:</strong> {{ $datos['telefono'] }} </p>

		<p><strong>Correo:</strong> {{ $datos['correo'] }}</p>

		<p><strong>Dirección:</strong> {{ $datos['direccion'] }} </p>

	

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

			@foreach ($cart as $item)

			<tr>

				<td style="border: 1px solid #fff ;">{{ $item['name'] }}</td>

				<td style="border: 1px solid #fff ;">{{ $item['qty'] }}</td>

				<td style="border: 1px solid #fff ;">{{ $item['price'] }} Bs.</td>

				<td style="border: 1px solid #fff ;">{{ $item['subtotal'] }} Bs.</td>

			</tr>

			<?php $total += $item['qty'] * $item['price']; ?>

			@endforeach



		</table>

		<h4 align="right">Total: {{ $total }} Bs. </h4>

	

		<div align="center">
        
        <div style="background-color:#CCC; width:80%; color:#000; margin-bottom:50px;">
        <span style="font-weight:bold; font-size:20px; color:#F00;">Instrucciones Para Completar tu Compra<br></span>
        <span style="font-weight:bold;">Deposita o has una transferencia a las siguientes Cuentas.<br><br></span>
        
        <span>Banco Occidental de Descuento <strong style="color:#060;">B.O.D.</strong><br>
        Cuenta Corriente No. <strong>0116-0062-07-0015733190</strong><br>
        A nombre de: <strong>Joel Oquendo</strong><br>
        C.I. No. <strong>18575744</strong><br><br></span>
        
        <span>Banco <strong style="color:#F00;">BICENTENARIO</strong><br>
        Cuenta Corriente No. <strong>0175-0241-70-0071874321</strong><br>
        A nombre de: <strong>JoelBlackberryZone C.A.</strong><br>
        RIF. <strong>J-40213263-8</strong><br><br><br></span>
        
        
        LUEGO REPORTA TU PAGO HACIENDO CLICK EL EL SIGUIENTE LINK "COMPLETAR PAGO", LLENA EL FORMILARIO Y LISTO.
        </div>

			<a href="http://joelblackberryzone.com.ve/factura/{{ $datos['slug'] }}" style="font-size: 28px; background-color: #de2824; color: #ecf0f1; text-decoration: none; padding: .6em; border-bottom: 5px solid #c0392b; margin: 0 auto;"> Completar Pago </a>

		</div>

	</div>

	

</body>

</html>