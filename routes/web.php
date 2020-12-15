<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', function () {
    return view('welcome');
});

Route::get('/usuarios/{id}', function ($id) {
    return "El id del usuario es {$id}";
})->where('id', '[0-9]+');

Route::get('/usuarios/nuevo', function () {
    return "Usario nuevo";
});