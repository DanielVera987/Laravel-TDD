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

Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('user.edit');

Route::put('/usuarios/{user}/', 'UserController@update')->name('user.update');

Route::delete('/usuarios/{user}', 'UserController@destroy')->name('user.destroy');

Route::get('/saludo/{name}/{nickname?}', 'WelcomeController@index');