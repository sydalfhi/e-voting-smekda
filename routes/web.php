<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\ProfileController;
use App\Models\Kandidat;
use App\Models\User;
use App\Models\VisiMisi;
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
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
    Route::get('/tambah-kandidat', [KandidatController::class, 'create'])->name('kandidat.create');
    Route::post('/tambah-kandidat', [KandidatController::class, 'store'])->name('kandidat.store');
    Route::get('/edit-kandidat/{id}', [KandidatController::class, 'edit'])->name('kandidat.edit');
    Route::put('/update-kandidat/{id}', [KandidatController::class, 'update'])->name('kandidat.update');
    Route::delete('/hapus-kandidat/{id}', [KandidatController::class, 'destroy'])->name('kandidat.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pemilih', [PemilihController::class, 'index'])->name('pemilih.index');
    Route::post('/pemilih', [PemilihController::class, 'import'])->name('pemilih.store');
    Route::delete('/pemilih', [PemilihController::class, 'destroy'])->name('pemilih.destroy');
});


Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/vote', function () {
        $data = Kandidat::all();
        return view('pages.frontend.vote.index', compact('data'));
    });

    Route::post('/vote',  [KandidatController::class, 'vote'])->name('kandidat.vote');
    Route::get('/selesai', function () {
        return view('pages.frontend.vote.selesai');
    })->name('kandidat.vote.selesai');
});












require __DIR__ . '/auth.php';
