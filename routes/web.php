<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LogHistoryController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

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

Route::group(['middleware' => 'guest', 'controller' => AuthController::class], function() {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'login')->name('login.store');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('data-pegawai', DataPegawaiController::class)->names('data-pegawai');
    Route::resource('jabatan', JabatanController::class)->names('jabatan');
    Route::resource('surat-masuk', SuratMasukController::class)->names('surat-masuk');
    Route::resource('surat-keluar', SuratKeluarController::class)->names('surat-keluar');
    Route::resource('divisi', DivisiController::class)->names('divisi');
    Route::resource('disposisi', DisposisiController::class)->names('disposisi');
    Route::resource('log-history', LogHistoryController::class)->names('log-history');
    Route::get('profile', [Controller::class, 'profile'])->name('profile');

    Route::get("ajax/jabatan/{id?}", [JabatanController::class, 'getJabatan'])->name('ajax.getJabatan');
    Route::get("ajax/data-pegawai/{id?}", [DataPegawaiController::class, 'getUser'])->name('ajax.getUser');
    Route::get("ajax/surat-masuk/{id?}", [SuratMasukController::class, 'getSuratM'])->name('ajax.getSuratM');
    Route::get("ajax/surat-keluar/{id?}", [SuratKeluarController::class, 'getSuratK'])->name('ajax.getSuratK');
    Route::get("ajax/divisi/{id?}", [DivisiController::class, 'getDivisi'])->name('ajax.getDivisi');
    Route::get("ajax/disposisi/{id?}", [DisposisiController::class, 'getDisposisi'])->name('ajax.getDisposisi');

    Route::get('surat-masuk/status/menunggu-verifikasi', [SuratMasukController::class, 'waitVerif'])->name('surat-masuk.waitVerif');
    Route::get('surat-masuk/status/koreksi', [SuratMasukController::class, 'waitCorrection'])->name('surat-masuk.waitCorrection');
    Route::get('surat-masuk/disposisi/{id?}', [SuratMasukController::class, 'disposisi'])->name('surat-masuk.disposisi');
    Route::post('surat-masuk/disposisi/{id?}', [SuratMasukController::class, 'disposisiStore'])->name('surat-masuk.disposisi.store');
    Route::put('surat-masuk/disposisi/{id?}', [SuratMasukController::class, 'disposisiUpdate'])->name('surat-masuk.disposisi.update');
    Route::delete('surat-masuk/disposisi/{id?}', [SuratMasukController::class, 'disposisiDestroy'])->name('surat-masuk.disposisi.destroy');
});
