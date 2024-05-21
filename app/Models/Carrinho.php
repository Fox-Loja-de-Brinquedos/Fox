<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;
    protected $table = 'CARRINHO_ITEM';

    // Indica que a chave primária não é auto-incrementável
    public $incrementing = false;

    // O Eloquent espera que a chave primária seja 'id' por padrão
    // Nós definimos isso para evitar possíveis problemas
    protected $primaryKey = ['USUARIO_ID', 'PRODUTO_ID'];

    public $timestamps = false;

    protected $fillable = [
        'USUARIO_ID',
        'PRODUTO_ID',
        'ITEM_QTD'
    ];
}