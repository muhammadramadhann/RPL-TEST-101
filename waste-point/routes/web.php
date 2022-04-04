<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Penukaran\SampahController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/penukaran-sampah', [SampahController::class, 'index'])->name('penukaran-sampah');
Route::post('/penukaran-sampah', [SampahController::class, 'store'])->name('penukaran-sampah');

// must guest
Route::middleware('guest')->group(function() {
    // authentication
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register');    
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login');
});

// must signed in
Route::middleware('auth')->group(function() {
    Route::get('admin', [AdminDashboardController::class, 'index'])->name('admin');
    Route::post('logout', LogoutController::class)->name('logout');
});
