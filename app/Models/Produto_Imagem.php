<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto_Imagem extends Model
{
    use HasFactory;
    protected $table = "PRODUTO_IMAGEM";
    protected $primaryKey = "IMAGEM_ID";
    public $timestamps = false;

    public function produto(){
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }
}
