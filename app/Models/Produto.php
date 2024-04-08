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

    public function imagens(){
        return $this->hasMany(Produto_Imagem::class , "PRODUTO_ID");
        }

        public function estoque(){
            return $this->belongsTo(Produto_Estoque::class, "PRODUTO_ID");
        }
}
