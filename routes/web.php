<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Criação de grupo de controllers para autenticação
Route::controller(AuthController::class)->group(function(){

    //Rotas de Registro
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    //Rotas de Login
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    //Rota de Logout
    Route::get('logout', 'logout')->middleware('auth')->name('logout');

});

Route::middleware('auth')->group(function(){
    Route::get('albums', function(){
        return view('albums');
    })->name('albums');});


Route::controller(AlbumController::class)->prefix('albums')->group(function () {

    //Listando todos os albuns
    Route::get('',  'index')->name('albums');

    //Pesquisando album por nome
    Route::get('search',  'search')->name('albums.search');

    //Criando novo Album
    Route::get('create', 'create')->name('albums.create');

    //Salvando o Album
    Route::post('store', 'store')->name('albums.store');

    //Editando um Album
    Route::get('edit', 'edit')->name('albums.edit');

    //Deletando um Album
    Route::delete('destroy/{id}', 'destroy')->name('albums.destroy');
});


Route::controller(TrackController::class)->prefix('tracks')->group(function () {

//Listando todos as faixas
Route::get('',  'index')->name('tracks');

//Pesquisando album por nome
Route::get('search',  'search')->name('tracks.search');


//Criando nova Faixa
//Route::get('albums/{albumId}/tracks/create', 'create')->name('tracks.create');
Route::get('albums/{albumId}/tracks/create', [TrackController::class, 'create'])->name('tracks.create');

//Salvando a nova Faixa
Route::post('albums/{albumId}/tracks/', 'store')->name('tracks.store');

//Deletando uma Faixa
Route::delete('destroy/{id}', 'destroy')->name('tracks.destroy');
});

