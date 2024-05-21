<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Item extends Model
{
    protected $table = 'PEDIDO_ITEM';
    public $timestamps = false;

    protected $fillable = [
        'PRODUTO_ID',
        'PEDIDO_ID',
        'ITEM_QTD',
        'ITEM_PRECO'
    ];

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto', 'PRODUTO_ID');
    }

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido', 'PEDIDO_ID');
    }
}
