<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ClienteController;
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
//auth
Route::post('/C-login', [LoginController::class,'login']);
Route::get('/C-logout', [LoginController::class,'logout']);


//Usuarios
Route::apiResource('/C-usuarios', UsuarioController::class);
Route::post('/C-usuarios/editar', [UsuarioController::class,'editar']);
Route::post('/C-usuarios/getRol', [UsuarioController::class,'getRol']);



//Rols
Route::apiResource('/C-rols', RolController::class);
Route::post('/C-rols/editar', [RolController::class,'editar']);
Route::get('/rol/GetPermisos', [RolController::class,'getPermisos']);
Route::get('/C-rol/getListRolPermiso', [RolController::class,'getListRolPermiso']);
Route::get('/rol/GetRol/{id}', [RolController::class,'getRol']);

//permiso
Route::apiResource('/C-permiso', PermisoController::class);
Route::post('/C-permiso/editar', [PermisoController::class,'editar']);

//Clientes
Route::apiResource('/C-clientes', ClienteController::class);
Route::get('/GetProvincias', [ClienteController::class,'getProvincias']);
Route::get('/GetMunicipios/{id}', [ClienteController::class,'getMunicipios']);
Route::post('/C-clientes/editar', [ClienteController::class, 'editar']);
Route::post('/C-clienteReferencia', [ClienteController::class, 'guardarReferencia']);

Route::get('/{optional?}', function () {
    return view('pages.layout');
})->name('basepath')->where('optional', '.*');