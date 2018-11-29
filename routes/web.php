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

Route::get('/', function () {
  if (Auth::guest())
    return view('auth/login');
  else
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');

Route::resource('bombero','BomberoController',['except' => ['show']]);


Route::get('usuario/permisos', 'UserController@showPermisos')->name('usuario.permisos');
Route::put('usuario/modificar', 'UserController@permisosUpdate')->name('usuario.permisosupdate');
Route::resource('usuario','UserController');

Route::get('asistencia/rango', 'AsistenciaController@rango')->name('AsistenciaController.rango');
Route::resource('asistencia','AsistenciaController');

Route::resource('planilla','PlanillaController');
Route::get('planilla/mostrar/{id}', 'PlanillaController@mostrar')->name('planilla.mostrar');
Route::get('planilla/imprimir/{id}', 'PlanillaController@imprimir')->name('planilla.imprimir');

Route::get('puntuacion/anual', 'PuntuacionController@anual')->name('puntuacion.anual');
Route::get('puntuacion/anual/{bombero}/{inicio}/{fin}', 'PuntuacionController@tabla_anual')->name('puntuacion.tabla_anual');
Route::get('puntuacion/bomberos/{mes}/{year}', 'PuntuacionController@bomberos')->name('puntuacion.bomberos');
Route::get('puntuacion/listar/{mes}/{year}', 'PuntuacionController@listar')->name('puntuacion.listar');
Route::get('puntuacion/{mes}/{year}/{bombero}/puntuacionmes', 'PuntuacionController@puntuacionmes')->name('puntuacion.puntuacionmes');

Route::resource('puntuacion','PuntuacionController');
Route::resource('vehiculo','VehiculoController');
Route::resource('variable','VariableController');
Route::resource('material','MaterialController');
Route::resource('planilla','PlanillaController');
Route::resource('planilla/{id}/renglon','RenglonController');

Route::get('servicio/reporte/', 'ServicioController@reporte')->name('servicio.reporte');
Route::get('servicio/llamada', 'ServicioController@llamada')->name('servicio.llamada');
Route::get('servicio/ultimos', 'ServicioController@ultimos')->name('servicio.ultimos');
Route::get('servicio/activo/{id}', 'ServicioController@finalizarActivo')->name('servicio.finalizarActivo');
route::get('servicio/finalizado', 'ServicioController@finalizado')->name('servicio.finalizado');
Route::get('servicio/estadistica', 'ServicioController@estadistica')->name('servicio.estadistica');
Route::get('servicio/{monthSince}/{yearSince}/{monthUntil}/{yearUntil}/tabla', 'ServicioController@tabla')->name('servicio.tabla');
Route::get('servicio/reporte/planilla/{id}', 'ServicioController@tablaPlanilla')->name('servicio.planilla');
Route::get('servicio/reporte/asistencia/{id}', 'ServicioController@tablaAsistencia')->name('servicio.asistencia');
Route::get('servicio/planilla/{id}', 'ServicioController@planilla')->name('servicio.planilla');
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

Route::get('reemplazo/terminados', 'ReemplazoController@terminados')->name('reemplazo.terminados');
Route::get('reemplazo/activos', 'ReemplazoController@index')->name('reemplazo.activos');
Route::resource('reemplazo','ReemplazoController');
