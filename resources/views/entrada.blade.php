@extends('layout')

@section('body')
<br><br>
@include('info')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif







<div class="container">
	<h2>Entrada para {{ Session::get('placa') }}
	</h2>
	<hr>
	<div class="row">
		<div class="col-6">

		<a href="{{ route('portal.index') }}" class="btn btn-outline-primary d-inline-block">Volver</a>
		</div>
		<div class="col-6">
			<embed src="{{ route('entradapdf', Session::get('placa') ) }}" type="application/pdf" width="600px" height="800px"></embed>
		</div>
	</div>
</div>


@endsection