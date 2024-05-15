<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Item extends Model
{
    protected $table = 'PEDIDO_ITEM';
    public $timestamps = false;

    protected $fillable = ['ITEM_QTD', 'ITEM_PRECO'];

    public function produto()
    {
        return $this->belongsTo('App\Produto', 'produto_id');
    }

    public function pedido()
    {
        return $this->belongsTo('App\Pedido', 'pedido_id');
    }
}