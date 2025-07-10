<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController; // Import HomeController
use App\Http\Controllers\WargaController; // Import WargaController
use App\Http\Controllers\JenisBantuanController; // Import JenisBantuanController
use App\Http\Controllers\PengajuanController; // Import PengajuanController
use App\Http\Controllers\DistribusiController; // Import DistribusiController
use App\Http\Controllers\FrontendController; // Import FrontendController
use Illuminate\Support\Facades\Route;

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

// Rute Publik (Frontend)
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/program', [FrontendController::class, 'program'])->name('program');
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/ajukan-bantuan', function() {
    $jenisBantuans = App\Models\JenisBantuan::all();
    return view('frontend.pengajuan', compact('jenisBantuans'));
})->name('ajukan.bantuan.form'); // Menambahkan rute GET untuk form
Route::post('/ajukan-bantuan', [FrontendController::class, 'storePengajuan'])->name('ajukan.bantuan.store'); // Dengan AJAX

// Rute Autentikasi Laravel Breeze
require __DIR__.'/auth.php';

// Rute Backend (Admin & Petugas)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Rute untuk Admin (Akses penuh)
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('wargas', WargaController::class);
        Route::resource('jenis-bantuan', JenisBantuanController::class)->parameters(['jenis-bantuan' => 'jenisBantuan']);
        // Admin memiliki akses penuh ke pengajuan dan distribusi
        Route::resource('pengajuan', PengajuanController::class);
        Route::resource('distribusi', DistribusiController::class);
    });

    // Rute untuk Petugas (Akses terbatas ke Pengajuan dan Distribusi)
    Route::middleware(['role:petugas'])->group(function () {
        Route::resource('pengajuan', PengajuanController::class)->except(['create', 'store', 'destroy']); // Petugas bisa melihat, mengedit status pengajuan
        Route::resource('distribusi', DistribusiController::class); // Petugas bisa mengelola distribusi
    });

    // Rute untuk profil (dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});