<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'CARRINHO_ITEM';
    protected $primaryKey = ['USUARIO_ID', 'PRODUTO_ID'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'USUARIO_ID',
        'PRODUTO_ID',
        'ITEM_QTD',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID', 'USUARIO_ID');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }

    public function setKeysForSaveQuery($query)
    {
        $query
            ->where('USUARIO_ID', '=', $this->getAttribute('USUARIO_ID'))
            ->where('PRODUTO_ID', '=', $this->getAttribute('PRODUTO_ID'));
        return $query;
    }
}