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
    //$users = \App\User::where('loggable_type', '=', 'App\Alumno')->get()->contains('id', 2);
    //return dd($users);
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('usuarios', 'UserController');
