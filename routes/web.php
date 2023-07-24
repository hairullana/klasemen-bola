<?php

use App\Http\Controllers\KlasemenBolaController;
use Illuminate\Support\Facades\Route;

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

Route::controller(KlasemenBolaController::class)->group(function() {
    Route::get('/', 'klasemenBola')->name('klasemen-bola');
    Route::get('/tambah-klub', 'tambahKlub')->name('tambah-klub');
    Route::post('/tambah-klub-action', 'tambahKlubAction')->name('tambah-klub-action');
    Route::get('/tambah-pertandingan', 'tambahPertandingan')->name('tambah-pertandingan');
});
