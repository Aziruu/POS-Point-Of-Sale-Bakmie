<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    MenuController,
    OrderController,
    AdminController,
    CustomerController,
    Auth\LoginController,
    BarangController,
    CategoryController,
    DashboardController,
    PemasokController,
    TransactionController,
    UserController
};

// Routes Login
Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    // Manajemen Menu & Kategori
    Route::resource('menu', MenuController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('barang', BarangController::class)->except(['show']);
    Route::get('barang/export-pdf', [BarangController::class, 'exportPdf'])->name('barang.exportPdf');
    Route::resource('pemasok', PemasokController::class)->except(['show']);
    Route::get('pemasok/export-pdf', [PemasokController::class, 'exportPdf'])->name('pemasok.exportPdf');

    // Manajemen User
    Route::resource('user', UserController::class)->except(['show'])->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ]);

    // Order
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order', 'index')->name('admin.order.index');
        Route::post('/order/add/{id}', 'add')->name('admin.order.add');
        Route::post('/order/remove/{id}', 'remove')->name('admin.order.remove');
        Route::post('/order/checkout', 'checkout')->name('admin.order.checkout');
        Route::post('/order/confirm', 'confirm')->name('admin.order.confirm');
        Route::post('/order/store', 'store')->name('admin.order.store');
    });

    // Transaksi
    Route::controller(TransactionController::class)->group(function() {
        Route::get('/transaction-history', 'history')->name('admin.transaction.history');
        Route::get('/laporan-transaction',  'laporan')->name('admin.transaction.laporan');
        Route::get('/transaction/{id}/print', 'print')->name('admin.transaction.print');
        Route::get('/transaction/{id}/pdf', 'pdf')->name('admin.transaction.pdf');
    });
});

// Kasir Routes
Route::prefix('kasir')->middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'kasir'])->name('kasir.dashboard');

    Route::controller(OrderController::class)->group(function () {
        Route::get('/order', 'index')->name('kasir.order.index');
        Route::post('/order/add/{id}', 'add')->name('kasir.order.add');
        Route::post('/order/remove/{id}', 'remove')->name('kasir.order.remove');
        Route::post('/order/checkout', 'checkout')->name('kasir.order.checkout');
        Route::post('/order/confirm', 'confirm')->name('kasir.order.confirm');
        Route::post('/order/store', 'store')->name('kasir.order.store');
    });

    Route::controller(TransactionController::class)->group(function() {
        Route::get('/transaction-history', 'history')->name('kasir.transaction.history');
        Route::get('/laporan-transaction',  'laporan')->name('kasir.transaction.laporan');
        Route::get('/transaction/{id}/print', 'print')->name('kasir.transaction.print');
        Route::get('/transaction/{id}/pdf', 'pdf')->name('kasir.transaction.pdf');
    });
});

// User Routes
Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');

    Route::controller(OrderController::class)->group(function () {
        Route::get('/order', 'index')->name('user.order.index');
        Route::post('/order/add/{id}', 'add')->name('user.order.add');
        Route::post('/order/remove/{id}', 'remove')->name('user.order.remove');
        Route::post('/order/checkout', 'checkout')->name('user.order.checkout');
        Route::post('/order/confirm', 'confirm')->name('user.order.confirm');
        Route::post('/order/store', 'store')->name('user.order.store');
    });

    Route::get('/transaction-history', [TransactionController::class, 'history'])->name('user.transaction.history');
});
