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
    return view('welcome');
});
Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('bombero','BomberoController');

Route::resource('vehiculos','VehiculoController');

Route::resource('materiales','MaterialController');

// Route::group(['prefix' => 'bombero'], function () {
//
//     Route::get('/alta', 'BomberoController@vistaAlta');
//     Route::get('/lista', 'BomberoController@vistaLista');
//
//     Route::post('/alta', 'BomberoController@altaBombero');
// });
