<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Config;

class InicioController extends Controller
{
	public function __construct()
	{
		$nombresistema = Config::select('valor')->where('item', 'nombresistema')->pluck('valor');
        $nombresistema = $nombresistema[0];
        define('NOMBRESISTEMA', $nombresistema);
	}
   
	public function index()
	{
		return view('inicio');
	}


}
