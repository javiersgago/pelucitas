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

// Rutas públicas
Route::get('/', 'InicioController@mostrarInicio');
Route::resource('servicios', 'ServiciosController');
Route::resource('contacto', 'ContactoController');
Route::resource('cita', 'CitaController');

// Rutas empleados
Route::redirect('empleados', 'empleados/agenda');
Route::resource('empleados/agenda', 'EmpleadosController');
Route::resource('empleados/personal', 'PersonalController');
Route::resource('empleados/servicios', 'GestionServiciosController');

// Rutas Auth
Auth::routes(['register' => false]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Rutas Ajax
Route::post('citasPeluquero', 'AjaxController@citasPeluquero');
Route::post('citasDia', 'AjaxController@citasDia');
Route::post('agenda', 'AjaxController@agenda');
Route::post('borrarCita', 'AjaxController@borrarCita');
Route::post('cargarPerfil', 'AjaxController@cargarPerfil');
Route::post('borrarPerfil', 'AjaxController@borrarPerfil');
Route::post('cargarServicio', 'AjaxController@cargarServicio');