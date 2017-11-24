<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use App\Http\Requests\ConfigRequest;

use App\Config;

class ConfigController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
        $nombresistema = Config::select('valor')->where('item', 'nombresistema')->pluck('valor');
        $nombresistema = $nombresistema[0];
        define('NOMBRESISTEMA', $nombresistema);
    }


    public function index()
    {
    	$config = Config::get();
    	return view('config', compact('config'));
    }

    public function update(Request $request, $configuracion)
    {
    	$vehiculo = Config::Find($configuracion);
    	$vehiculo->valor = $request->valor;

    	$vehiculo->save();
    	return redirect()->route('configuracion.index')->with('success', 'Configuracion Actualizada');

    }
}
