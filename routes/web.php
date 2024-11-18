<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;
use Illuminate\Support\Facades\Auth;

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

// PENDAFTAR
Route::get('/', [DBController::class, 'index'])->name('/');
Route::post('/daftar', [DBController::class, 'daftar']);
Route::post('/login', [DBController::class, 'login']);
Route::middleware('auth:pendaftar')->group(function () {
    Route::get('/form-pendaftar', [DBController::class, 'form']);
    Route::post('/form-pendaftar', [DBController::class, 'form_complete']);
    Route::get('/form-lengkap', [DBController::class, 'form_done']);
    Route::get('/logout', [DBController::class, 'logout']);
});

// PANITIA
Route::get('/para-panitia', [DBController::class, 'login_panitia']);
Route::post('/para-panitia', [DBController::class, 'cek_panitia']);
Route::middleware('auth:panitia')->group(function () {
    Route::get('/panitia', [DBController::class, 'panitia']);
    Route::get('/pendaftar/{nis}', [DBController::class, 'get_pendaftar']);
    Route::get('/send/{nis}', [DBController::class, 'send_message']);
    Route::get('/hapus/{nis}', [DBController::class, 'before_delete']);
    Route::put('/pendaftar/{nis}', [DBController::class, 'put_pendaftar']);
    Route::delete('/pendaftar/{nis}', [DBController::class, 'delete_pendaftar']);
    Route::post('/gelombang', [DBController::class, 'gelombang']);
    Route::get('/logout-panitia', [DBController::class, 'logout_panitia']);
});

// GET DATA WILAYAH
Route::get('kab/{id}', [DBController::class, 'kab']);
Route::get('kec/{id}', [DBController::class, 'kec']);
Route::get('kel/{id}', [DBController::class, 'kel']);