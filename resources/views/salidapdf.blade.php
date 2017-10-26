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

$horaini = substr($vehiculo->created_at,-8);
$horafin = substr($now,-8);

	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);
 
	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);
 
	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);
 
	$dif=$fin-$ini;
 
	$difh=floor($dif/3600);
	$difm=floor(($dif-($difh*3600))/60);
	$difs=$dif-($difm*60)-($difh*3600);
	$x = date("H:i:s",mktime($difh,$difm,$difs));

	if ($difm>=1) {
		$horascobradas = $difh+1;
	}
	elseif ($difs>=1) {
		$horascobradas = $difh+1;
	}


?>
<center>

	<strong style="font-size: 1.4rem ;">PARQUEADERO JASMIN S.A</strong> <br>
	NIT: 19.344.630-4 <br>
	<span>REGIMEN SIMPLIFICADO</span> <br>
	<span>Calle 31 # 23-12</span> <br>
	<span>BUCARAMANGA</span> <br>
	<span>Tel: 6537950</span>
	<br><br>

	<span><strong>RECIBO DE SALIDA </strong> </span>

	<br><br>

	<table>
		<tr>
			<td>
				<strong>PLACA: </strong>
			</td>
			<td>{{ $vehiculo->placa }} </td>
			<td> </td>
			<td>
				<strong>Tipo: </strong>
			</td>
			<td>
				{{ $vehiculo->tipo }}
			</td>
		</tr>
	</table>

	<table style="padding-left: 45px;">
		<tr>
			<td style="text-align: right; padding-right: 15px;">
				<strong>FECHA ENTRADA: </strong>
			</td>
			<td> {{ $vehiculo->created_at }} </td>
		</tr>
		<tr>
			<td style="text-align: right; padding-right: 15px;">
				<strong>FECHA SALIDA: </strong>
			</td>
			<td> {{ $now }} </td>
		</tr>
		<tr>
			<td style="text-align: right; padding-right: 15px;">
				<strong>DURACION: </strong>
			</td>
			<td> {{ $x }} </td>
		</tr>
		<tr>
			<td style="text-align: right; padding-right: 15px;">
				<strong>HORAS COBRADAS: </strong>
			</td>
			<td> {{ $horascobradas }} </td>
		</tr>
		<tr>
			<td style="text-align: right; padding-right: 15px;">
				<strong>VALOR POR HORA: </strong>
			</td>
			<td>

			<?php if ($vehiculo->tipo=='Automovil') {
				$precio = $preciocarros;
				echo " $ " . number_format($precio);
			} 
			elseif ($vehiculo->tipo=='Moto') {
				$precio = $preciomotos;
				echo " $ " . number_format($precio);
			}



			?>

			</td>
		</tr>
		<tr>
			<td style="text-align: right; padding-right: 15px;">
				<strong>VALOR TOTAL: </strong>
			</td>
			<td> $ {!! $dada = number_format($horascobradas * $precio) !!} </td>
		</tr>
	</table>

</center>

</body>
</html>