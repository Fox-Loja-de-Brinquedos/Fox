<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtoController;

Route::get("/produto", [produtoController::class,"index"])->name('produto');