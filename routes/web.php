<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\IssuesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'], 'redirect');


Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'], 'redirect')->name('dashboard');
Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('home.admin');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/fetch-issues', [DeviceController::class, 'fetchIssues'])->name('fetch.issues');

Route::middleware('auth','redirect')->group(function(){
    Route::get('/user/view', [UserController::class, 'index'])->name('admin.user.view');
    Route::post('/add_user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/store_user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete_user/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::middleware('auth','redirect')->group(function(){
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/supplier/view', 'index')->name('supplier.view');
        Route::post('/add_supplier', 'store')->name('supplier.store');
        Route::get('/edit_supplier/{id}', 'edit')->name('supplier.edit');
        Route::patch('/store_supplier/{id}', 'update')->name('supplier.update');
        Route::delete('/delete_supplier/{id}', 'destroy')->name('supplier.delete');
    });
});


Route::middleware('auth','redirect')->group(function(){
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category/view', 'index')->name('category.view');
        Route::post('/add_category', 'store')->name('category.store');
        Route::get('/edit_category/{id}', 'edit')->name('category.edit');
        Route::patch('/store_category/{id}', 'update')->name('category.update');
        Route::delete('/delete_category/{id}', 'destroy')->name('category.delete');
    });
});


Route::middleware('auth','redirect')->group(function(){
    Route::controller(InventoryController::class)->group(function () {
        Route::get('/inventory/view', 'index')->name('inventory.view');
        Route::post('/add_inventory', 'store')->name('inventory.store');
        Route::get('/edit_inventory/{id}', 'edit')->name('inventory.edit');
        Route::patch('/store_inventory/{id}', 'update')->name('inventory.update');
        Route::delete('/delete_inventory/{id}', 'destroy')->name('inventory.delete');
    });
});

Route::middleware('auth','redirect')->group(function(){
    Route::controller(IssuesController::class)->group(function () {
        Route::get('/issue/view', 'index')->name('issue.view');
        Route::post('/add_issue', 'store')->name('issue.store');
        Route::get('/edit_issue/{id}', 'edit')->name('issue.edit');
        Route::patch('/store_issue/{id}', 'update')->name('issue.update');
        Route::delete('/delete_issue/{id}', 'destroy')->name('issue.delete');
    });
});

Route::middleware('auth','redirect')->group(function(){
    Route::controller(BookingController::class)->group(function () {
        Route::get('/booking/view', 'index')->name('booking.view');
        Route::post('/add_booking', 'store')->name('booking.store');
        Route::get('/edit_booking/{id}', 'edit')->name('booking.edit');
        Route::patch('/store_booking/{id}', 'update')->name('booking.update');
        Route::delete('/delete_booking/{id}', 'destroy')->name('booking.delete');
        Route::delete('user/delete_booking/{id}', 'user_destroy')->name('user.booking.delete');
        // user 
        Route::get('/book', 'user_index')->name('book.view');
        Route::get('/status', 'user_status')->name('status.view');
        Route::post('/book/service', 'user_book')->name('book.store');
    });
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

