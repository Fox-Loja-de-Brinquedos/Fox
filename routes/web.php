<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtoController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\addressController;



Route::get("/", [produtoController::class,"index"])->name('produto');


Route::middleware('auth')->group(function () {
Route::get('/profile', [profileController::class, 'create'])->name('profile');
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//rotas de gerenciar perfil
Route::get('/accountDetails', [profileController::class, 'showAccountDetails'])->name('accountDetails');
Route::post('/updateProfileName', [profileController::class, 'updateProfileName'])->name('update.name');
Route::post('/updateProfileEmail', [profileController::class, 'updateProfileEmail'])->name('update.email');
Route::post('/updateProfilePassword', [profileController::class, 'updateProfilePassword'])->name('update.password');

//Rotas de gerenciar endereços
Route::get('/address', [addressController::class, 'showAddress'])->name('address');
Route::post('/address/store', [AddressController::class, 'store'])->name('address.store');
Route::put('/address/{endereco}', [AddressController::class, 'update'])->name('address.update');
Route::post('address/remove', [AddressController::class, 'removeAddress'])->name('address.remove');

//Rotas de gerenciar pedidos
Route::get('/orderList', [orderController::class, 'index'])->name('orderList');


});

Route::get("/", [produtoController::class,"index"])->name('produto.index'); 
Route::get("/search", [produtoController::class, "search"])->name('produto.search');

require __DIR__.'/auth.php';
