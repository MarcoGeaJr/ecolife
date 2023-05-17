<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CidadeController;

Auth::routes();

Route::get('/home', function(){
    return redirect('/welcome');
})->name('home');

Route::get('/', function(){
    return redirect('/welcome');
});

Route::get('/welcome', function(){
    return view('/welcome', [
        "nome_completo" => Auth::user()->name
    ]);
})->middleware('auth');

Route::group(['prefix' => 'produto'], function(){
    // Get
    Route::get('/', 'ProdutoController@index');
    Route::get('/search', 'ProdutoController@pesquisa');

    // Post
    Route::get('/novo_produto', 'ProdutoController@novo_produto');
    Route::post('/novo', 'ProdutoController@cadastrar');

    // Delete
    Route::get('/excluir/{id}', 'ProdutoController@excluir');

    // Put
    Route::get('/editar_produto/{id}', 'ProdutoController@editar_produto');
    Route::post('/editar', 'ProdutoController@editar');
});

Route::group(['prefix' => 'cliente'], function(){
    // Get
    Route::get('/', 'ClienteController@index');
    Route::get('/search', 'ClienteController@pesquisa');

    // Post
    Route::get('/novo_cliente', 'ClienteController@novo_cliente');
    Route::post('/novo', 'ClienteController@cadastrar');

    // Delete
    Route::get('/excluir/{id}', 'ClienteController@excluir');

    // Put
    Route::get('/editar_cliente/{id}', 'ClienteController@editar_cliente');
    Route::post('/editar', 'ClienteController@editar');
});

Route::group(['prefix' => 'cidade'], function(){
    // Get
    Route::get('/', 'CidadeController@index');

    // Post
    Route::get('/nova_cidade', 'CidadeController@nova_cidade');
    Route::post('/novo', 'CidadeController@cadastrar');

    // Delete
    Route::get('/excluir/{id}', 'CidadeController@excluir');

    // Put
    Route::get('/editar_cidade/{id}', 'CidadeController@editar_cidade');
    Route::post('/editar', 'CidadeController@editar');
});