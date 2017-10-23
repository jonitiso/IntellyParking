@extends('layout')

@section('body')
@foreach($aaa as $aaa)<?php $cantidadcarros = $aaa->valor; ?>@endforeach
@foreach($aaamotos as $aaamotos)<?php $cantidadmotos = $aaamotos->valor; ?>@endforeach

<?php $totalcarros = $conteocarros*100/($cantidadcarros); ?>
<?php $totalmotos = $conteomotos*100/($cantidadmotos); ?>

<?php $ccccarros = $cantidadcarros - $conteocarros;  ?>

<?php $cccmotos = $cantidadmotos - $conteomotos;  ?>





<br><br>
<div class="container-fluid">
    <div class="row">
    <div class="col-1"></div>
        <div class="col-md-7">
            <div class="card card-default border border-primary">
                <div class="card-header text-white bg-primary"><span style="font-weight: 500">Uso de los parqueaderos:</span></div>

                <div class="card-body">

                @include('info')
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center>
                        <div class="alert alert-info">
                            <h2>{{ $now }}  <span id="liveclock"></span></h2>
                            <br>
    
                    @if($ccccarros==0 AND $cccmotos==0)

                            <strong>Atencion: </strong>El parqueadero esta lleno.
                        </div>
                    </center>


                    @elseif($ccccarros==1)

                            <strong>Atencion: </strong>Queda solo <strong>{{ $ccccarros }}</strong> espacio disponible para automoviles
                        </div>
                    </center>
                    @elseif($ccccarros<=4)

                            <strong>Atencion: </strong>Quedan solo <strong>{{ $ccccarros }}</strong> espacios disponibles para automoviles
                        </div>
                    </center>

                    @elseif($ccccarros==$cantidadcarros AND $cccmotos==$cantidadmotos)

                            <strong>Informacion: </strong>El parqueadero esta vacio.
                        </div>
                    </center>

                    @else

                            <strong>Informacion: </strong>Quedan <strong>{{ $ccccarros }}</strong> espacios disponibles para automoviles
                        </div>
                    </center>

                    @endif
                    


                    <br>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $totalcarros }}%; height: 20px;" aria-valuenow="{{ $totalcarros }}" aria-valuemin="0" aria-valuemax="100">{{ $totalcarros }}%</div>

                    </div>
                    <br>
                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $totalmotos }}%; height: 20px;" aria-valuenow="{{ $totalmotos }}" aria-valuemin="0" aria-valuemax="100">{{ $totalmotos }}%</div>
                    <b></b>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <span class="bg-primary text-primary" style="border-radius: 40px;">......</span> <span>Automoviles</span>
                        </div>
                        <div class="col-4">
                            <span class="bg-danger text-danger" style="border-radius: 40px;">......</span> <span>Motos</span>
                        </div>
                    </div>

                </div>
            </div>

            <br>


            <div class="card card-default border border-success">
                <div class="card-header text-white bg-success"><span style="font-weight: 500">Nuevo Vehiculo:</span></div>

                <div class="card-body">

                    <form method="POST" action="{{ route('portal.store') }}" class="form form-inline">
                        {{csrf_field()}}
                        <input type="text" class="form-control" v-model="Nuevo_Placa" name="placa" placeholder="Ingrese la Placa"> 
                        <div v-if="Nuevo_Placa!==''">
                            <input type="submit" value="Agregar Vehiculo" class="btn btn-outline-success">
                        </div>
                        <div v-if="Nuevo_Placa==''">
                            <input disabled type="submit" value="Agregar Vehiculo" class="btn btn-outline-success">
                        </div>

                        
                    </form>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-3">
            <div class="card card-default border border-secondary">
                <div class="card-header text-white bg-secondary"><span style="font-weight: 500">Vehiculos Estacionados</span></div>

                <div class="card-body">
                    <a href="{{ route('deleteall') }}" class="btn btn-outline-danger"><span class="material-icons">delete_forever</span></a><br><br>
                    <ul class="list-group">
                    @foreach($vehiculos as $vehiculos)
                        <li class="list-group-item"><span>{{ $vehiculos->placa }} </span>
                        
                        <a class="btn btn-outline-primary" href="{{ route('salida', $vehiculos->id) }}" class="btn"><span class="material-icons">print</span></a>

                    @endforeach
                    </ul>

                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
