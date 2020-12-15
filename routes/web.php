<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.layout');
});

Route::get('/usuarios', 'UserController@index');

Route::get('/usuarios/{id}', 'UserController@show')
    ->where('id', '[0-9]+');

Route::get('/usuarios/nuevo', 'UserController@create');

Route::get('/saludo/{name}/{nickname?}', 'WelcomeController@index');