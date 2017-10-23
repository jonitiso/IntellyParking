<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Recibo de Pago</title>
</head>
<body>
	<script type="text/javascript">
	try {
		this.print();
	}
	catch(e) {
		window.onload = window.print;
	}
</script>
@foreach($preciocarro as $preciocarro)<?php $preciocarros = $preciocarro->valor; ?>@endforeach
@foreach($preciomoto as $preciomoto)<?php $preciomotos = $preciomoto->valor; ?>@endforeach

 <?php 

$rest = substr($placa, -1);
        if (is_numeric($rest)) {
             $tipo = "Automovil";
        }
        else {
             $tipo = "Moto";

        }

 ?>

<center>

	<strong style="font-size: 1.4rem ;">PARQUEADERO JASMIN S.A</strong> <br>
	NIT: 19.344.630-4 <br>
	<span>REGIMEN SIMPLIFICADO</span> <br>
	<span>Calle 31 # 23-12</span> <br>
	<span>BUCARAMANGA</span>
	<br><br>



	<br>

	<table>
		<tr>
			<td>
				<strong>PLACA: </strong>{{ $placa }}
			</td>
			<td></td>
			<td> </td>
			<td> </td>
			<td> </td>

			<td>
				<strong>Tipo: </strong>{{ $tipo }}
			</td>
			<td>
				
			</td>
		</tr>
	</table>

	<table>
		<tr>
			<td>
				<strong>FECHA ENTRADA:</strong>
			</td>
			<td> {{ $now }}</td>
		</tr>
		<tr>
			<td> </td>
		</tr>
		<tr>
			<td> </td>
		</tr>

		<tr>
			<td>
				<strong>VALOR POR HORA:</strong>
			</td>
			<td>
				$ {{ $preciocarros }}

			</td>
		</tr>
		<tr>
			
		</tr>
	</table>
	<br><br>

	<span>RECUERDE MANTENER SUS COSAS GUARDADAS EN UN LUGAR SEGURO, GRACIAS POR UTILIZAR NUESTROS SERVICIOS.</span>

</center>

</body>
</html>