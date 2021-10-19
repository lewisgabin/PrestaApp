<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PrestamosCrontroller;
use App\Http\Controllers\RutaController;

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
Route::get('/GetSectores/{id}', [ClienteController::class,'getSectores']);
Route::get('/GetRutas', [ClienteController::class,'getRutas']);
Route::get('/AddRuta/{id}', [ClienteController::class,'addRuta']);
Route::post('/C-clientes/editar', [ClienteController::class, 'editar']);
Route::post('/C-clienteReferencia', [ClienteController::class, 'guardarReferencia']);
Route::post('/C-clienteSector', [ClienteController::class, 'guardarSector']);
Route::post('/C-clienteRuta', [ClienteController::class, 'guardarRuta']);
Route::post('/C-clienteEditarReferencia', [ClienteController::class, 'editarReferencia']);

//prestamos
Route::get('C-prestamo/getClientes',[PrestamosCrontroller::class, 'listClientes']);
Route::post('C-prestamo/Guardar',[PrestamosCrontroller::class, 'guardar']);

//Rutas
Route::apiResource('/C-ruta', RutaController::class);

Route::get('/{optional?}', function () {
    return view('pages.layout');
})->name('basepath')->where('optional', '.*');