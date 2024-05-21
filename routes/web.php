<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ArrivalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartureController;
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
    return view('home');
});

// * Auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login/auth', [AuthController::class, 'authenticate'])->name('auth');

// Route::get('register', [AuthController::class, 'register'])->name('register');
// Route::post('register/store', [AuthController::class, 'store'])->name('register.store');

// * Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// * Admin
Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('departure/data', [DepartureController::class, 'data'])->name('departure.data');
    Route::post('departure/data/tambah', [DepartureController::class, 'store'])->name('departure.tambah');
    Route::delete('departure/data/hapus/{departure}', [DepartureController::class, 'destroy'])->name('departure.hapus');
    // Route::get('departure/data/edit/{id}', [DepartureController::class, 'edit'])->name('departure.edit');
    Route::get('departure/data/{departure}/edit', [DepartureController::class, 'edit'])->name('departure.edit');
    Route::put('departure/data/update/{departure}', [DepartureController::class, 'update'])->name('departure.update');

    Route::get('arrival/data/', [ArrivalController::class, 'data'])->name('arrival.data');
    Route::post('arrival/data/tambah', [ArrivalController::class, 'store'])->name('arrival.tambah');
    Route::delete('arrival/data/hapus/{arrival}', [ArrivalController::class, 'destroy'])->name('arrival.hapus');
    // Route::get('arrival/data/{id}/edit', [ArrivalController::class, 'edit'])->name('arrival.edit');
    Route::get('arrival/data/{arrival}/edit', [ArrivalController::class, 'edit'])->name('arrival.edit');
    Route::put('arrival/data/update/{arrival}', [ArrivalController::class, 'update'])->name('arrival.update');
});

// * Departure
Route::get('departure/', [DepartureController::class, 'index'])->name('departure');

// * Arrival
Route::get('arrival/', [ArrivalController::class, 'index'])->name('arrival');


