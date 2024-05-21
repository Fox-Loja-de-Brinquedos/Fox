<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pedido extends Model
{
    protected $table = 'PEDIDO';
    protected $primaryKey = 'PEDIDO_ID';
    public $timestamps = false;

    protected $fillable = [
        'USUARIO_ID',
        'STATUS_ID',
        'PEDIDO_DATA',
        'ENDERECO_ID'
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\Pedido_Status', 'STATUS_ID', 'STATUS_ID');
    }

    public function itens()
    {
        return $this->hasMany('App\Models\Pedido_Item', 'PEDIDO_ID');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'USUARIO_ID');
    }

    public function endereco()
    {
        return $this->belongsTo('App\Models\Endereco', 'ENDERECO_ID');
    }
}
