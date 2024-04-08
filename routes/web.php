<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtoController;
use App\Http\Controllers\loginController;

Route::get("/produto", [produtoController::class,"index"])->name('produto');


Route::get('/login', [loginController::class, 'index']);