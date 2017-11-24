@extends('layout')

@section('body')
<br><br>

<div class="container">
	<h2>Configuracion del Sistema</h2>
	<hr>
	<br>
	@include('info')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
	<br>
@foreach($config as $config)
	<form action="{{ route('configuracion.update', $config->id) }}" method="POST">
	{{ method_field('PUT') }}
	 {{csrf_field()}}

	 
		<div class="row form-group">
			<div class="col-3">{{ $config->nombre }}</div>
			@if(is_numeric($config->valor))
			<div class="col-2">
				<input type="number" class="form-control" value="{{ $config->valor }}" name="valor">
			</div>
			<div class="col-2"></div>
			@else
			<div class="col-4">
				<input type="text" class="form-control" value="{{ $config->valor }}" name="valor">
			</div>
			
			@endif
			<div class="col-3">
				<button class="btn btn-primary" type="submit"><div class="material-icons">save</div></button>
			</div>
		</div>

	
	</form>
@endforeach

</div>


@endsection