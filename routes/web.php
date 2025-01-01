<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\VideoKursusController;
use App\Http\Controllers\MateriKursusController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');

// Route::get('/details/{kursus:slug}', [FrontController::class, 'details'])->name('front.index');

Route::get('/kategori/{kategori:slug}', [FrontController::class, 'kategori'])->name('front.kategori');

Route::get('/harga', [FrontController::class, 'harga'])->name('front.harga');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //harus login untuk transaksi
    Route::get('/checkout', [FrontController::class, 'checkout'])->name('front.checkout')
    ->middleware('role:peserta');
    
    Route::post('/checkout/store', [FrontController::class, 'checkout_store'])->name('front.checkout.store')
    ->middleware('role:peserta');

    Route::post('/learning/{kursus}/{videoKursusID}', [FrontController::class, 'checkout_store'])->name('front.learning')
    ->middleware('role:peserta|instruktur|owner');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('kategoris', KategoriController::class)
        ->middleware('role:owner');

        Route::resource('instrukturs', InstrukturController::class)
        ->middleware('role:owner');

        Route::resource('pesertas', PesertaController::class)
        ->middleware('role:owner');

        Route::resource('kursuses', KursusController::class)
        ->middleware('role:owner');

        Route::resource('kelases', KelasController::class)
        ->middleware('role:owner');

        Route::resource('enrolls', EnrollController::class)
        ->middleware('role:owner');

        Route::get('/kursuses/{kursus:id}/add_materi', [MateriKursusController::class, 'create'])
        ->middleware('role:owner')
        ->name('kursus.add_materi');
    
        Route::post('/add/materikursus/save/{kursus:id}', [MateriKursusController::class, 'store'])
        ->middleware('role:owner')
        ->name('kursus.add_materi.save');

        Route::resource('materi_kursuses', MateriKursusController::class)
        ->middleware('role:owner');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

require __DIR__.'/auth.php';
