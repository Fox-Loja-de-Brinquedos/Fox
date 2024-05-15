<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'pedido_id';
    public $timestamps = false;

    protected $fillable = ['PEDIDO_DATA'];

    public function status()
    {
        return $this->belongsTo('App\PedidoStatus', 'status_id');
    }

    public function itens()
    {
        return $this->hasMany('App\PedidoItem', 'pedido_id');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'usuario_id');
    }

    public function endereco()
    {
        return $this->belongsTo('App\Endereco', 'endereco_id');
    }
}
