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


//Usuario
//Route::resource('usuario','Usuario');
Route::post('usuario', 'Usuario@store');

Route::get('/crear_usuario', [
    'uses'=>'Usuario@create',
    'as'=> 'crear_usuario'
]);


Route::get('{id}/edit',   [
    'uses' => 'Usuario@edit',
    'as' => 'profile_edit'
]);
Route::put('{id}/edit',   [
    'uses' => 'Usuario@update',
    'as' => 'profile_edit'
]);

Route::get('/listar_usuarios', [
    'uses'=>'Usuario@listar',
    'as'=> 'listar_usuarios'
]);

//home login
Route::get('/', [
    'uses'=>'HomeController@index',
    'as'=> 'home'
]);
// Authentication routes...

Route::get('login', [
    'uses'=>'Auth\AuthController@getLogin',
    'as'=> 'login'
]);
Route::post('login',
    'Auth\AuthController@postLogin'
);

Route::get('logout', [
    'uses'=>'Auth\AuthController@getLogout',
    'as'=> 'logout'
]);

//correo
Route::get('correo',[
    'uses'=>'correo@index',
    'as'=> 'sndcorreo'
]);

Route::post('sndcorreo',[
    'uses'=>'correo@store',
    'as'=> 'sndcorreo'
]);

//pagos
Route::get('registrar_pago',[
    'uses'=>'pagos@create',
    'as'=> 'registrar_pago'
]);
//pagos -> saldo inicial
Route::get('registrar_saldo',[
    'uses'=>'pagos@inicial',
    'as'=> 'registrar_saldo'
]);

//servicios
Route::get('ver_servicios',[
    'uses'=>'servicios@create',
    'as'=> 'ver_servicios'
]);

//encuestas
Route::get('crear_encuesta',[
    'uses'=>'encuestas@create',
    'as'=> 'crear_encuesta'
]);
Route::post('save_encuesta',[
    'uses'=>'encuestas@store',
    'as'=> 'save_encuesta'
]);
Route::post('/votar',[
    'uses'=>'encuestas@votar',
    'as'=> 'votar'
]);
Route::post('validar_voto',[
    'uses'=>'encuestas@validar_voto',
    'as'=> 'validar_voto'
]);






// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

