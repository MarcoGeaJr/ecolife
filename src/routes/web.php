<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CidadeController;

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
    Route::get('/', function(){
        return view('auth.register');
    });
});
