<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'tampilkanFormMasuk'])->name('login');
Route::post('/login', [UserController::class, 'prosesMasuk']);

Route::get('/register', [UserController::class, 'tampilkanFormDaftar'])->name('register');
Route::post('/register', [UserController::class, 'prosesDaftar']);

Route::get('/home', [UserController::class, 'berandaCustomer'])->name('customer.home');
Route::get('/store/dashboard', [UserController::class, 'dashboardToko'])->name('store.dashboard');
Route::get('/admin/dashboard', [UserController::class, 'dashboardAdmin'])->name('admin.dashboard');

Route::post('/logout', [UserController::class, 'prosesKeluar'])->name('logout');
