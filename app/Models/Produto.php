<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = "PRODUTO";
    protected $primaryKey = "PRODUTO_ID";
    public $timestamps = false;

    protected $fillable = [
        'PRODUTO_NOME',
        'PRODUTO_DESCONTO', 
    ];

    public function imagens(){
        return $this->hasMany(Produto_Imagem::class , "PRODUTO_ID");
        }

        public function estoque(){ 
            return $this->belongsTo(Produto_Estoque::class, "PRODUTO_ID");
        }

        public function categoria(){ 
            return $this->belongsTo(CATEGORIA::class, "CATEGORIA_ID");
        }

        public function pedido_item() {
            return $this->hasMany(PEDIDO_ITEM::class, "PRODUTO_ID");
        }

        public function carrinhoItens()
        {
            return $this->hasMany(Carrinho::class, 'PRODUTO_ID', 'PRODUTO_ID');
        }
}
