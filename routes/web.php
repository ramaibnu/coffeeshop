<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User
Route::get('/user', [UserController::class, 'index'])->name('user.index');

// Supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier.delete');
