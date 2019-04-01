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

Route::get('/', 'InicioController@mostrarInicio');

Route::resource('servicios', 'ServiciosController');

Route::resource('contacto', 'ContactoController');

Route::resource('cita', 'CitaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('citasPeluquero', 'AjaxController@citasPeluquero');
Route::post('citasDia', 'AjaxController@citasDia');