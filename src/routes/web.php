<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\OrcamentoController;

Auth::routes();

Route::get('/', function(){
    return redirect('/landing');
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

Route::group(["prefix" => '/landing'], function(){
    Route::get('/', 'LandingController@index');

    Route::get('/editar', 'LandingController@editar')->middleware('auth');
    Route::post('/alterar', 'LandingController@alterar')->middleware('auth');
});

Route::group(["prefix" => '/clientes'], function(){
    Route::get('/', 'ClienteController@index');
    Route::get('/novo', 'ClienteController@novo');
    Route::get('/editar/{id}', 'ClienteController@editar');

    Route::post('/cadastrar', 'ClienteController@cadastrar');
    Route::post('/alterar', 'ClienteController@alterar');

    Route::get('/excluir/{id}', 'ClienteController@excluir');
});

Route::group(["prefix" => '/comentarios'], function(){
    Route::get('/', 'ComentarioController@index')->middleware('auth');

    Route::post('/cadastrar', 'ComentarioController@cadastrar');

    Route::get('/excluir/{id}', 'ComentarioController@remover')->middleware('auth');
});

Route::group(["prefix" => '/orcamentos'], function(){
    Route::get('/', 'OrcamentoController@index')->middleware('auth');
    Route::get('/novo', 'OrcamentoController@novo')->middleware('auth');

    Route::post('/cadastrar', 'OrcamentoController@cadastrar')->middleware('auth');
    Route::post('/solicitar', 'OrcamentoController@solicitar');

    Route::get('/cancelar/{id}', 'OrcamentoController@cancelar')->middleware('auth');
});