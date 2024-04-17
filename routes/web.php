<?php

use App\Http\Controllers\KandidatController;
use App\Http\Controllers\ProfileController;
use App\Models\Kandidat;
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

Route::get('/dashboard', function () {
    return view('pages.backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
    Route::get('/tambah-kandidat', [KandidatController::class, 'create'])->name('kandidat.create');
    Route::post('/tambah-kandidat', [KandidatController::class, 'store'])->name('kandidat.store');
    Route::patch('/kandidat', [KandidatController::class, 'update'])->name('kandidat.update');
    Route::delete('/kandidat', [KandidatController::class, 'destroy'])->name('kandidat.destroy');
});



// voting page
Route::get('/vote', function () {
    $data = Kandidat::all();
    return view('pages.frontend.vote.index', compact('data'));
});
//ketika user melakukan vote
Route::post('/vote',  [KandidatController::class, 'vote'])->name('kandidat.vote');








require __DIR__ . '/auth.php';
