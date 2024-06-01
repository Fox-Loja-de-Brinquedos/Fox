<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto_Estoque extends Model
{
    use HasFactory;
    protected $table = "PRODUTO_ESTOQUE";
    protected $primaryKey = "PRODUTO_ID";
    public $timestamps = false;

    protected $fillable = [
        'PRODUTO_ID',
        'PRODUTO_QTD'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }
}
