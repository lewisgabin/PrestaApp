<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LanguageController;
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


//
Route::apiResource('/C-usuarios', UsuarioController::class);
Route::post('/C-usuarios/editar', [UsuarioController::class,'editar']);



Route::get('/{optional?}', function () {
    return view('pages.layout');
})->name('basepath')->where('optional', '.*');

