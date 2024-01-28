<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\KategoriIndikatorController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RespondenController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form', [FormController::class, 'store'])->name('form.store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('/indikator', KategoriIndikatorController::class)->except('create', 'update', 'show');
    Route::resource('/pertanyaan', PertanyaanController::class)->except('create', 'update', 'show');
    Route::resource('/responden', RespondenController::class)->except('create', 'update', 'show');
    Route::resource('/hasil', HasilController::class)->except('update');
    Route::put('/updatehasil', [AdminController::class, 'updatehasil'])->name('update.hasil');

    Route::get('/perhitungan', [AdminController::class, 'perhitungan'])->name('csi.perhitungan');
    Route::get('/csi/{tahun}', [AdminController::class, 'csi'])->name('csi.index');
});

require __DIR__ . '/auth.php';
