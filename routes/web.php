<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\OrderProcessController;

// LOGIN AUTH
Route::get('/', [AuthController::class, 'getLogin'])->name('login');
Route::get('login', [AuthController::class, 'getLogin'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('register', [AuthController::class, 'getRegister'])->name('register');
Route::post('register', [AuthController::class, 'postRegister']);


Route::group(['middleware' => Authenticate::class], function(){
    // get all item
    Route::get('/barang', [BarangController::class, 'getBarang'])->name('getBarang');
    // create new item
    Route::post('barang/storeBarang', [BarangController::class, 'storeBarang'])->name('storeBarang');
    // edit route item master
    Route::get('barang/edit/{id}',  [BarangController::class, 'edit'])->name('edit');
    // update route
    Route::post('barang/update', [BarangController::class, 'update'])->name('update');
    // delete item master
    Route::get('barang/deleteBarang/{id}', [BarangController::class, 'deleteBarang'])->name('deleteBarang');

    // ORDER PROCESS
    // get order process page
    Route::get('orderProcess', [OrderProcessController::class, 'getItemMasterList'])->name('getItemMasterList');
    // get data price by selected item
    Route::get('findPrice', [OrderProcessController::class, 'getItemPrice'])->name('getItemPrice'); // getItemPrice
    // store order
    Route::post('orderProcess/storeOrder', [OrderProcessController::class, 'storeOrder'])->name('storeOrder');



    Route::get('logout', [AuthController::class, 'getLogout'])->name('logout');
});
