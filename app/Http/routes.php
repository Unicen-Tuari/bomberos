<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
  if (Auth::guest())
    return view('auth/login');
  else
    return view('home');
});

Route::auth();

Route::get('/home', 'HomeController@index')->name('home.index');

Route::get('bombero/responsable', 'BomberoController@altaResponsable')->name('bombero.altaResponsable');

Route::resource('bombero','BomberoController',['except' => ['show']]);

Route::get('asistencia/puntuacion', 'AsistenciaController@puntuacion')->name('asistencia.puntuacion');
Route::resource('asistencia','AsistenciaController');

Route::resource('vehiculo','VehiculoController');

Route::resource('material','MaterialController');

Route::resource('servicio/tipo','TipoServicioController',['except' => ['create']]);

Route::get('servicio/presentes', 'ServicioController@presentes')->name('servicio.presentes');
Route::get('servicio/llamada', 'ServicioController@llamada')->name('servicio.llamada');
Route::get('servicio/activo/{id}', 'ServicioController@finalizarActivo')->name('servicio.finalizarActivo');
route::get('servicio/finalizado', 'ServicioController@finalizado')->name('servicio.finalizado');
Route::get('servicio/estadistica', 'ServicioController@estadistica')->name('servicio.estadistica');
Route::get('servicio/{mes}/{anio}/tabla', 'ServicioController@tabla')->name('servicio.tabla');
Route::post('servicio/guardar_presentes', 'ServicioController@guardar_presentes')->name('servicio.guardar_presentes');
Route::post('servicio/iniciado', 'ServicioController@iniciado')->name('servicio.iniciado');
Route::put('servicio/activo/{id}/finalizar', 'ServicioController@guardarActivo')->name('servicio.guardarActivo');
Route::put('servicio/activo/{id}/salida', 'ServicioController@salida')->name('servicio.salida');
Route::resource('servicio','ServicioController');

Route::get('ingreso/listar', 'IngresoController@listarIngresos')->name('ingreso.listar');
Route::post('ingreso/', 'IngresoController@guardarIngreso')->name('ingreso.guardarIngreso');
Route::delete('ingreso/{id}', 'IngresoController@borrarIngreso')->name('ingreso.borrarIngreso');
