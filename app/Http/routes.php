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

Route::get('usuario/permisos', 'BomberoController@permisos')->name('bombero.permisos');
Route::put('usuario/modificar', 'BomberoController@permisosupdate')->name('bombero.permisosupdate');
Route::resource('bombero','BomberoController',['except' => ['show']]);

Route::get('asistencia/rango', 'AsistenciaController@rango')->name('AsistenciaController.rango');
Route::resource('asistencia','AsistenciaController');

Route::get('puntuacion/variables', 'PuntuacionController@variables')->name('puntuacion.variables');
Route::get('puntuacion/anual', 'PuntuacionController@anual')->name('puntuacion.anual');
Route::get('puntuacion/anual/{bombero}/{inicio}/{fin}', 'PuntuacionController@tabla_anual')->name('puntuacion.tabla_anual');
Route::get('puntuacion/bomberos/{mes}/{anio}', 'PuntuacionController@bomberos')->name('puntuacion.bomberos');
Route::get('puntuacion/listar/{mes}/{anio}', 'PuntuacionController@listar')->name('puntuacion.listar');
Route::get('puntuacion/{mes}/{anio}/{bombero}/puntuacionmes', 'PuntuacionController@puntuacionmes')->name('puntuacion.puntuacionmes');
Route::post('puntuacion/variables', 'PuntuacionController@modificaar_variables')->name('puntuacion.modificar');
Route::resource('puntuacion','PuntuacionController');

Route::resource('vehiculo','VehiculoController');

Route::resource('material','MaterialController');

Route::get('servicio/llamada', 'ServicioController@llamada')->name('servicio.llamada');
Route::get('servicio/ultimos', 'ServicioController@ultimos')->name('servicio.ultimos');
Route::get('servicio/activo/{id}', 'ServicioController@finalizarActivo')->name('servicio.finalizarActivo');
route::get('servicio/finalizado', 'ServicioController@finalizado')->name('servicio.finalizado');
Route::get('servicio/estadistica', 'ServicioController@estadistica')->name('servicio.estadistica');
Route::get('servicio/{mes}/{anio}/tabla', 'ServicioController@tabla')->name('servicio.tabla');
Route::post('servicio/guardarPresentes', 'ServicioController@guardar_presentes')->name('servicio.guardar_presentes');
Route::post('servicio/iniciado', 'ServicioController@iniciado')->name('servicio.iniciado');
Route::put('servicio/editarPresentes', 'ServicioController@editar_presentes')->name('servicio.editar_presentes');
Route::put('servicio/activo/{id}/finalizar', 'ServicioController@guardarActivo')->name('servicio.guardarActivo');
Route::put('servicio/activo/{id}/salida', 'ServicioController@salida')->name('servicio.salida');
Route::resource('servicio','ServicioController');

Route::get('ingreso/{id}', 'IngresoController@show')->name('ingreso.show');
Route::get('ingreso/presentes/edit/{servicio}', 'IngresoController@editPresentes')->name('ingreso.editPresentes');
Route::get('ingreso/presentes/{servicio}/{acargo}', 'IngresoController@indexPresentes')->name('ingreso.indexPresentes');
Route::post('ingreso', 'IngresoController@guardarIngreso')->name('ingreso.guardarIngreso');
Route::delete('ingreso/{id}', 'IngresoController@borrarIngreso')->name('ingreso.borrarIngreso');
