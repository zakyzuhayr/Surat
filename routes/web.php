<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratKeluarController;
use App\Models\SuratKeluar;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::get('/', [LoginController::class, 'login_view'])->name('login_view');
// Route::post('/login', [LoginController::class, 'login_post'])->name('post_login');
Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'login_view')->name('login_view');
    Route::post('/login', 'login_post')->name('login_post');
    Route::get('/logout', 'logout')->name('logout');
});

Route::prefix('surat')->group(function () {
    Route::middleware(['auth', 'role:admin|user'])->group(function(){
        Route::prefix('masuk')->group(function () {
            Route::get('/index', [SuratController::class, 'surat_masuk'])->name('surat_masuk');
            Route::post('/tambah', [SuratController::class, 'surat_masuk_tambah'])->name('surat_masuk_tambah');
            Route::get('/view/{id}', [SuratController::class, 'view_surat'])->name('view_surat');
            Route::get('/edit/{id}', [SuratController::class, 'edit_surat_view'])->name('edit_surat_view');
            Route::post('/edit', [SuratController::class, 'edit_surat_post'])->name('edit_surat_post');
            Route::get('/hapus/{id}', [SuratController::class, 'hapus_surat'])->name('hapus_surat');
        });

        Route::prefix('keluar')->group(function () {
            Route::get('/index', [SuratKeluarController::class, 'surat_keluar'])->name('surat_keluar');
            Route::post('/tambah', [SuratKeluarController::class, 'surat_keluar_tambah'])->name('surat_keluar_tambah');
            Route::get('/view/{id}', [SuratKeluarController::class, 'view_surat_keluar_pdf'])->name('view_surat_keluar_pdf');
            Route::get('/edit/{id}', [SuratKeluarController::class, 'edit_surat_keluar_view'])->name('edit_surat_keluar_view');
            Route::post('/edit', [SuratKeluarController::class, 'edit_surat_keluar_post'])->name('edit_surat_keluar_post');
            Route::get('/hapus/{id}', [SuratKeluarController::class, 'surat_keluar_hapus'])->name('surat_keluar_hapus');
        });


    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/beranda', [AdminController::class, 'beranda'])->name('beranda');
    Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('pengaturan');
    Route::post('/tambaha/user', [AdminController::class, 'tambah_user'])->name('tambah_user');
    Route::get('/edit/user/{id}', [AdminController::class, 'edit_user'])->name('edit_user');
    Route::post('/edit/user', [AdminController::class, 'edit_user_post'])->name('edit_user_post');
    Route::get('/hapus/{id}', [AdminController::class, 'hapus_user'])->name('hapus_user');

});

// Route::get('/admin/beranda', function () {
//     return view('Administrator.beranda');
// });

Route::get('/admin/pengaturan', function () {
    return view('Administrator.pengaturan_page');
});

// Route::get('/admin/surat/masuk', function () {
//     return view('Administrator.surat_masuk');
// });

// Route::get('/admin/surat_keluar', function () {
//     return view('Administrator.surat_keluar');
// })->name('surat_keluar');


// require __DIR__.'/auth.php';
