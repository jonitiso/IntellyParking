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

Route::get('/portal/{id}/vista', 'PortalController@vista')->name('vista');


Route::resource('/configuracion', 'ConfigController');
