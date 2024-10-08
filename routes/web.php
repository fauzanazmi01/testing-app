<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\GeminiAIController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'search'], function () {
    Route::get('/{id}', [UserController::class, 'findUser']);
    Route::get('/', [UserController::class, 'searchUser']);
});

Route::view('/chat', 'chat');

Route::resource('history_chat', GeminiAIController::class);
Route::resource('biodata', BiodataController::class);

Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

