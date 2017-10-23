<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'InicioController@index');

Auth::routes();

Route::resource('/portal', 'PortalController');

Route::get('/portal/{id}/salida', 'PortalController@salida')->name('salida');

Route::get('/portal_entrada', 'PortalController@entrada')->name('entrada');


Route::get('/deleteall', 'PortalController@deleteall')->name('deleteall');


Route::get('/portal_entradapdf/{placa}', 'PortalController@entradapdf')->name('entradapdf');

Route::get('/portal_salidapdf/{placa}', 'PortalController@salidapdf')->name('salidapdf');


Route::resource('/configuracion', 'ConfigController');
