<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtoController;

Route::get("/", [produtoController::class,"index"])->name('produto'); 
Route::get("/pesquisa", [produtoController::class, "search"])->name('pesquisa');