<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController; 
use App\Http\Controllers\AkunController;
use App\Http\Controllers\StokOpnameController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\LaporanPenjualanController;





Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/ganti-password', [UserController::class, 'changePasswordForm'])->name('ganti-password');
Route::post('/ganti-password', [UserController::class, 'updatePassword'])->name('update-password');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('forgot-password/change-password', [ForgotPasswordController::class, 'showChangePasswordForm'])->name('ganti-password');
    Route::post('forgot-password/change-password', [ForgotPasswordController::class, 'changePassword'])->name("ubah-password");
    Route::resource('akuns', AkunController::class);
    Route::resource('stokopnames', StokOpnameController::class);
    Route::resource('produks', ProdukController::class);

    // Add more routes that require authentication here
});

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}/update', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::delete('/karyawan/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');

Route::get('/pelanggan', [PelangganController::class, 'data'])->name('pelanggan.data');
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

Route::resource('shift', ShiftController::class);

Route::get('/shift', [ShiftController::class, 'index'])->name('shift.index');
Route::get('/shift/create', [ShiftController::class, 'create'])->name('shift.create');
Route::post('/shift', [ShiftController::class, 'store'])->name('shift.store');
Route::get('/shift/{id}/edit', [ShiftController::class, 'edit'])->name('shift.edit');
Route::put('/shift/{id}/update', [ShiftController::class, 'update'])->name('shift.update');
Route::delete('/shift/{shift}', [ShiftController::class, 'destroy'])->name('shift.destroy');

Route::resource('pos', PosController::class);
Route::get('/pos', [POSController::class, 'index'])->name('pos.index');
Route::get('/pos/create', [POSController::class, 'create'])->name('pos.create');
Route::get('/pos/{id}/edit', [POSController::class, 'edit'])->name('pos.edit');
Route::get('/pos/{id}/update', [POSController::class, 'create'])->name('pos.edit');
Route::post('/pos', [POSController::class, 'store'])->name('pos.store');
Route::get('/pos/result/{id}', [POSController::class, 'result'])->name('pos.result');
Route::get('/pos/struk/{id}', [POSController::class, 'cetakStruk'])->name('pos.struk');
Route::delete('/pos/{id}', [POSController::class, 'destroy'])->name('pos.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/laporan', [LaporanPenjualanController::class, 'index'])->name('laporan.index');

