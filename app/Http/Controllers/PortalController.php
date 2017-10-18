<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoRequest;
use App\Vehiculo;
use App\Config;
use App;
use Carbon\Carbon;

class PortalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {   
        $now = Carbon::today(-5);

        $now = $now->format('Y-m-d'); 

        $conteocarros = Vehiculo::where('tipo', 'Automovil')->get()->count();

        $conteomotos = Vehiculo::where('tipo', 'Moto')->get()->count();
 
        $aaa = Config::select('valor')->where('item', 'cantidad')->get();
        $aaamotos = Config::select('valor')->where('item', 'cantidadmotos')->get();



        $vehiculos = Vehiculo::get();

        return view('portal', compact('vehiculos', 'conteocarros', 'conteomotos', 'aaa', 'now', 'aaamotos'));
    }





    public function store(Request $request)
    {
        $vehiculo = new Vehiculo;
        $vehiculo->placa = $request->placa;

        $rest = substr($vehiculo->placa, -1);
        if (is_numeric($rest)) {
             $vehiculo->tipo = "Automovil";
        }
        else {
             $vehiculo->tipo = "Moto";
        }

        $vehiculo->save();
        return redirect()->route('portal.index')->with('info', 'Agregado');

    }

    public function destroy(Request $request, $id)
    {
        $vehiculo = Vehiculo::Find($id);
        $vehiculo->delete();
        return redirect()->route('portal.index')->with('info', 'Eliminado');
    }

    public function show(Request $request, $id)
    {
        $vehiculo = Vehiculo::Find($id);
        $now = Carbon::now(-5);
        $preciocarro = Config::select('valor')->where('item', 'preciocarro')->get();
        $preciomoto = Config::select('valor')->where('item', 'preciomoto')->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('vercarropdf', compact('vehiculo', 'now', 'preciomoto', 'preciocarro'))->setPaper('a5', 'potrait');

        return $pdf->stream();
    }

    public function vista($id)
    {
        $vehiculo = Vehiculo::Find($id);
        $preciocarro = Config::select('valor')->where('item', 'preciocarro')->get();
        $preciomoto = Config::select('valor')->where('item', 'preciomoto')->get();
        $now = Carbon::now(-5);
        return view('vercarro', compact('vehiculo', 'now', 'preciomoto', 'preciocarro'));
    }
}
