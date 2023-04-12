<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[JuegoController::class,'index'])->middleware('auth')->name('principal');

Route::view('/registrar','auth.registrar')->name('registrar');
Route::post('/registrar',[RegisteredUserController::class,'store']);

Route::view('/juego/prueba','juego.partida')->name('prueba'); //pendiente a eliminar

Route::view('/login','auth.login')->name('login');
Route::post('/login',[AuthenticatedSessionController::class,'store']);
Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

Route::get('/juego/create',[JuegoController::class,'create'])->middleware('auth')->name('CrearJuego');
Route::get('/juego/comprobar/{partida}',[JuegoController::class,'cargando'])->name('comprobar');
Route::get('/juego/{partida}',[JuegoController::class,'entrarPartida'])->middleware('auth')->name('partida');
Route::get('/juego/cambio/{partida}',[JuegoController::class,'cambioImagen'])->name('cambioImagen');


Route::get('/admin',[AdminController::class,'index'])->name('admin.principal')->middleware('role:admin');
Route::post('/admin',[FotoController::class,'store'])->name('admin.subirImagen')->middleware('role:admin');

