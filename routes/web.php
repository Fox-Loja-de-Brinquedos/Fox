<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtoController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\AuthenticatedSessionController;


Route::middleware('guest')->group(function () 
{
Route::get("/", [produtoController::class,"index"])->name('produto');
});


Route::middleware('auth')->group(function () {
Route::get('/profile', [profileController::class, 'index'])->name('profile');
Route::get('/address', [profileController::class, 'showAddress'])->name('address');
Route::get('/accountDetails', [profileController::class, 'showAccountDetails'])->name('accountDetails');
Route::get('/orderList', [orderController::class, 'index'])->name('orderList');


Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';