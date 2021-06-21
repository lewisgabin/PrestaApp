<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;
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


//Usuarios
Route::apiResource('/C-usuarios', UsuarioController::class);
Route::post('/C-usuarios/editar', [UsuarioController::class,'editar']);


//Rols
Route::apiResource('/C-rols', RolController::class);
Route::post('/C-rols/editar', [RolController::class,'editar']);

//permiso
Route::apiResource('/C-permiso', PermisoController::class);
Route::post('/C-permiso/editar', [PermisoController::class,'editar']);


Route::get('/{optional?}', function () {
    return view('pages.layout');
})->name('basepath')->where('optional', '.*');

