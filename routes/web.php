<?php

use App\Http\Controllers\KandidatController;
use App\Http\Controllers\ProfileController;
use App\Models\Kandidat;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// voting page
//menagani halaman vote
Route::get('/vote', function () {
    $data = Kandidat::all();
    return view('pages.frontend.vote.index', compact('data'));
});
//ketika user melakukan vote
Route::post('/vote',  [KandidatController::class, 'vote'])->name('kandidat.vote');




// Route::group('auth)', function () {
//     Route::get('/dashboard', function () {
//         $data = Tanggapan::all();
//         $pengaduan = ModelsPengaduan::all();
//         $user = User::all();
//         $pending = $pengaduan->where('status', 'pending');

//         return view('dashboard', compact('data', 'user', 'pengaduan', 'pending'));
//     })->middleware(['auth', 'verified'])->name('dashboard');
// });



require __DIR__ . '/auth.php';
