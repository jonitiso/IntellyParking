@extends('layout')

@section('body')
<br><br>
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


<div class="container">
	<h2>Recibo para {{ $vehiculo->placa }}</h2>
	<hr>
	<div class="row">
		<div class="col-6">

		<a href="{{ route('portal.index') }}" class="btn btn-outline-primary d-inline-block">Volver</a>
			<form action="{{ route('portal.destroy', $vehiculo->id) }}" method="POST" class="form form-inline d-inline-block">
				{{ method_field('DELETE') }}
	 			{{csrf_field()}}
				<input type="submit" class="btn btn-danger d-inline-block" value="Eliminar">
			</form>
		</div>
		<div class="col-6">
			<embed src="{{ route('salidapdf',$vehiculo->id) }}" type="application/pdf" width="600px" height="800px"></embed>
		</div>
	</div>
</div>


@endsection