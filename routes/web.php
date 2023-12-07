<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Auth;
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
});

Route::get('/test', function () {
    return view('welcome');
});

// Route::get('/fakultas', function() {
// return view('fakultas');
// });

// Route::get('/prodi', function() {
//     return view('prodi');
// });

// Route::get('/mahasiswa', function() {
//     return view('mahasiswa');
// });

//Admin
Route::middleware(['auth'])->group(function() {
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('fakultas', FakultasController::class);
    Route::resource('prodi', ProdiController::class);
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//User
// Route::middleware(['auth', 'checkRole:U'])->group(function() {
// Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['checkRole:A'])->name('home');
