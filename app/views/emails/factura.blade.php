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

		<h1>Recibo No. {{ $factura['id'] }} </h1>

		<hr>



		<h4>Datos de facturación: </h4>


		<p><strong>Nombre:</strong> {{ $user['full_name'] }} </p>

		<p><strong>Correo:</strong> {{ $user['email'] }} </p>
	

		<hr/>

		<h4>Compra: </h4>



		<table border="0" width="100%" style="border: 1px solid #fff ; text-align: center;">

			<tr>

				<th style="background-color: #C74751;">Producto</th>

				<th style="background-color: #C74751;">Cantidad</th>

				<th style="background-color: #C74751;">Precio</th>

				<th style="background-color: #C74751;">Subtotal</th>

			</tr>

			<?php 
				$total = 0; 
				$discount = 0;
			?>

			@foreach ($cart as $item)

			<tr>

				<td style="border: 1px solid #fff ;">{{ $item['name'] }}</td>

				<td style="border: 1px solid #fff ;">{{ $item['qty'] }}</td>

				<td style="border: 1px solid #fff ;">{{ number_format($item['price'], 2, ',', '.') }} Bs.</td>

				<td style="border: 1px solid #fff ;">{{ number_format($item['subtotal'], 2, ',', '.') }} Bs.</td>

			</tr>

			<?php 
				$total += $item['qty'] * $item['price']; 
				$discount += $item['qty'];
			?>

			@endforeach



		</table>
		@if($discount >= 12) && (Configuration::getDiscount() > 0))
			<h4 align="right">Sub-Total: Bs. {{ number_format($total, 2, ',', '.') }} </h4>
			<h4 align="right">Descuento 30%: Bs. {{ number_format($total*Configuration::getDiscount(), 2, ',', '.') }} </h4>
			Descuento del 30% a partir de 12 piezas <h4 align="right">Total: Bs. {{ number_format($total-($total*Configuration::getDiscount()), 2, ',', '.') }}</h4>
		@else
			<h4 align="right">Total: Bs. {{ number_format($total, 2, ',', '.') }} </h4>
		@endif

		<div align="center">
        
        <div style="background-color:#CCC; border-radius:5px; width:80%; color:#000; margin-bottom:50px;">
        <span style="font-weight:bold; font-size:20px; color:#C74751;">Instrucciones Para Completar tu Compra<br></span>
        <span style="font-weight:bold;">Deposita o has una transferencia a las siguientes Cuentas.<br><br></span>
        
        <span>Banesco Banco Universal <strong style="color:#060;">Banesco</strong><br>
        Cuenta Corriente No. <strong>0134-0073-31-0731061723</strong><br>
        A Nombre de: <strong>Vivian Medina</strong><br>
        C.I. No. <strong>14738935</strong><br><br></span>
      
        
        LUEGO REPORTA TU PAGO HACIENDO CLICK EL EL SIGUIENTE LINK "COMPLETAR PAGO", LLENA EL FORMULARIO Y LISTO.
        <br />
        <br />
        <strong>NOTA:</strong> SI EN UN LAPSO DE 24 HORAS NO HAS REALIZADO NINGUN PAGO EL PEDIDO SERA CANCELADO Y LA MERCANCIA VOLVERA A STOCK DE TIENDA
        <strong>-</strong> ESTA ES UNA CUENTA NO MONITOREADA. NO RESPONDA O REENVIA CORREOS A ESTA CUENTA.
        </div>

			<a href="http://cariocaactivewear.com/order/{{ $factura['id'] }}" style="font-size: 28px; background-color: #C74751; color: #ecf0f1; text-decoration: none; padding: .2em; border-bottom: 3px solid #8D2C33; margin: 0 auto; border-radius: 5px"> Completar Pago </a>

		</div>
		<br />
		<br />
		<br />
	</div>	

</body>

</html>