<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.layout');
});

Route::get('/usuarios', 'UserController@index')->name('users');

Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'UserController@create')
    ->name('users.create');
    
Route::post('/usuarios', 'UserController@store')->name('user.store');

Route::get('/saludo/{name}/{nickname?}', 'WelcomeController@index');