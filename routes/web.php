<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;

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

Route::get('/', [DBController::class, 'index'])->name('/');
Route::get('/panitia', [DBController::class, 'panitia']);
Route::post('/login', [DBController::class, 'login']);
Route::get('/form-pendaftar', [DBController::class, 'form'])->middleware('auth:pendaftar');

// PANITIA
// Route::get('/panitia', [DBController::class, 'panitia']);

// Route::get('/pendaftar', [DBController::class, 'pendaftar'])->middleware('auth');
// Route::put('/pendaftar/{id}', [DBController::class, 'u_pendaftar']);
// Route::delete('/pendaftar/{id}', [DBController::class, 'd_pendaftar']);

// Route::get('/hapus', [DBController::class, 'hapus'])->middleware('auth');
// Route::delete('/hapus/{id}', [DBController::class, 'd_hapus']);

// Route::get('/token', [DBController::class, 'token'])->middleware('auth');
// Route::put('/token/{id}', [DBController::class, 'u_token']);
// Route::put('/verify/{id}', [DBController::class, 'verify']);
// Route::delete('/token/{id}', [DBController::class, 'd_token']);

// PENGASUH
// Route::get('/pengasuh', [DBController::class, 'pengasuh']);
// Route::get('/detail', [DBController::class, 'detail']);