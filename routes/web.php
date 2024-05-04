<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtoController;

Route::get("/", [produtoController::class,"index"])->name('produto.index'); 
Route::get("/search", [produtoController::class, "search"])->name('produto.search');