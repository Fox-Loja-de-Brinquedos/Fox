<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\produtoController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\addressController;
use App\Http\Controllers\pedidoController;
use App\Http\Controllers\PoliticaController;

//Rotas Produto
Route::get("/", [produtoController::class, "index"])->name('produto.index'); 
Route::get("/search", [produtoController::class, "search"])->name('produto.search');
Route::get("/show/{produto}", [produtoController::class, "show"])->name('produto.show');

//Rota politicas
Route::get('/politicas/politica-de-privacidade', [PoliticaController::class, 'politicaDePrivacidade'])->name('politicas.politica-de-privacidade');
Route::get('/politicas/sobre-nos', [PoliticaController::class, 'sobreNos'])->name('politicas.sobre-nos');
Route::get('/politicas/trocas-devolucoes',[PoliticaController::class, 'trocasDevolucoes'])->name('politicas.trocas-devolucoes');

//Rotas autênticadas
Route::middleware('auth')->group(function () {
Route::get('/profile', [profileController::class, 'create'])->name('profile');
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//Rotas de gerenciar perfil
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
Route::get('/order/{id}', [OrderController::class, 'show'])->name('orderDetail');

//Rotas CRUD carrinho itens
Route::get('/carrinho', [pedidoController::class, 'listarItens'])->name('carrinho.listar');
Route::post('/carrinho/adicionar', [pedidoController::class, 'adicionarItem'])->name('carrinho.adicionar');
Route::post('/carrinho/remover-item', [pedidoController::class, 'removerItem'])->name('carrinho.removerItem');
Route::post('/carrinho/atualizar-item', [PedidoController::class, 'atualizarItem'])->name('carrinho.atualizarItem');

//Rotas para checkout
Route::get('/checkout', [pedidoController::class, 'checkout'])->name('carrinho.checkout');
Route::post('/finalizar-pedido', [pedidoController::class, 'finalizarPedido'])->name('pedido.finalizar');
});

require __DIR__.'/auth.php';