<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CausaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\SentenciaController;

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
    return view('auth.login');
});

Route::resource('causas', CausaController::class);
Route::resource('movimientos', MovimientoController::class);
Route::get('movimientos/mov/{movi}/{mov}', [MovimientoController::class, 'mov']);
Route::resource('sentencias', SentenciaController::class);

Route::get('/users/{user}', [UserController::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
