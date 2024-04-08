<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtoController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\orderController;

Route::get("/produto", [produtoController::class,"index"])->name('produto');


Route::get('/login', [loginController::class, 'index'])->name('login');

Route::get('/profile', [profileController::class, 'index'])->name('profile');
Route::get('/address', [profileController::class, 'showAddress'])->name('address');
Route::get('/accountDetails', [profileController::class, 'showAccountDetails'])->name('accountDetails');

Route::get('/orderList', [orderController::class, 'index'])->name('orderList');


