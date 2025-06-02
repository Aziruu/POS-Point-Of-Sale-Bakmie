<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Routes Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Halaman login
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout



// Route Role
// Route::middleware(['auth', 'checkRole:admin'])->get('/admin', [AdminController::class, 'index']);
// Route::middleware(['auth', 'checkRole:cashier'])->get('/cust', [CustomerController::class, 'index']);

// Home dashboard route
Route::get('/', [DashboardController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resource routes

//  Routes Menu
Route::resource('menu', MenuController::class)->except(['show']);

// Route Category
Route::resource('categories', CategoryController::class)->except(['show']);

//  Routes Order
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order/add/{id}', [OrderController::class, 'add'])->name('order.add');
Route::post('/order/remove/{id}', [OrderController::class, 'remove'])->name('order.remove');

Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');

Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

// Routes History - Laporan
Route::get('/transaction-history', [TransactionController::class, 'history'])->name('transaction.history');
Route::get('/laporan-transaction', [TransactionController::class, 'laporan'])->name('transaction.laporan');

Route::get('/transaction/{id}/print', [TransactionController::class, 'print'])->name('transaction.print');
Route::get('/transaction/{id}/pdf', [TransactionController::class, 'pdf'])->name('transaction.pdf');

// Manage User

Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/', [UserController::class, 'showUsers'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
