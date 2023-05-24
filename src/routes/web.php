<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

Auth::routes();

Route::get('/', function(){
    return view('/landing');
});

Route::get('/home', function(){
    return redirect('/painel');
})->name('home');

Route::get('/painel', function(){
    return view('layouts.admin');
})->middleware('auth');

Route::group(["prefix" => '/usuarios'], function(){
    Route::get('/', 'UsuarioController@index');
    Route::get('/novo', 'UsuarioController@novo');

    Route::post('/cadastrar', 'UsuarioController@cadastrar');
    Route::get('/excluir/{id}', 'UsuarioController@excluir');
});
