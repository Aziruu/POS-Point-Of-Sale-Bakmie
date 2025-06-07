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
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

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
        Route::get('/order', 'index')->name('order.index');
        Route::post('/order/add/{id}', 'add')->name('order.add');
        Route::post('/order/remove/{id}', 'remove')->name('order.remove');
        Route::post('/order/checkout', 'checkout')->name('order.checkout');
        Route::post('/order/confirm', 'confirm')->name('order.confirm');
        Route::post('/order/store', 'store')->name('order.store');
    });

    // Transaksi
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transaction-history', 'history')->name('transaction.history');
        Route::get('/laporan-transaction',  'laporan')->name('transaction.laporan');
        Route::get('/transaction/{id}/print', 'print')->name('transaction.print');
        Route::get('/transaction/{id}/pdf', 'pdf')->name('transaction.pdf');
    });
});

// Kasir Routes
Route::prefix('kasir')->middleware(['auth', 'role:kasir'])->name('kasir.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'kasir'])->name('dashboard');

    Route::resource('menu', MenuController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);

    Route::controller(OrderController::class)->group(function () {
        Route::get('/order', 'index')->name('order.index');
        Route::post('/order/add/{id}', 'add')->name('order.add');
        Route::post('/order/remove/{id}', 'remove')->name('order.remove');
        Route::post('/order/checkout', 'checkout')->name('order.checkout');
        Route::post('/order/confirm', 'confirm')->name('order.confirm');
        Route::post('/order/store', 'store')->name('order.store');
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transaction-history', 'history')->name('transaction.history');
        Route::get('/laporan-transaction',  'laporan')->name('transaction.laporan');
        Route::get('/transaction/{id}/print', 'print')->name('transaction.print');
        Route::get('/transaction/{id}/pdf', 'pdf')->name('transaction.pdf');
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

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transaction-history', 'history')->name('user.transaction.history');
        Route::get('/laporan-transaction',  'laporan')->name('user.transaction.laporan');
        Route::get('/transaction/{id}/print', 'print')->name('user.transaction.print');
        Route::get('/transaction/{id}/pdf', 'pdf')->name('user.transaction.pdf');
    });
});
