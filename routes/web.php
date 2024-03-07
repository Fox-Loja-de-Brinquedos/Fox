<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;

Route::get('/' , [indexController::class, 'index']); 