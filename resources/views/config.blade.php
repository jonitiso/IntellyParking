@extends('layout')

@section('body')
<br><br>

<div class="container">
	<h2>Configuracion del Sistema</h2>
	<hr>
	<br>
	<br>
@foreach($config as $config)
	<form action="{{ route('configuracion.update', $config->id) }}" method="POST">
	{{ method_field('PUT') }}
	 {{csrf_field()}}

	 
		<div class="row form-group">
			<div class="col-3">{{ $config->item }}: </div>
			<div class="col-3">
				<input type="number" class="form-control" value="{{ $config->valor }}" name="valor">
				
			</div>
			<div class="col-3"><input type="submit" value="Guardar" class="btn btn-primary"></div>
		</div>

	
	</form>
@endforeach

</div>


@endsection