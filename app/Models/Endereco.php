<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Endereco extends Model
{
    protected $table = 'ENDERECO';
    protected $primaryKey = 'ENDERECO_ID';
    public $timestamps = false;

    protected $fillable = [
        'ENDERECO_NOME',
        'ENDERECO_LOGRADOURO', 
        'ENDERECO_NUMERO', 
        'ENDERECO_COMPLEMENTO',
        'ENDERECO_CEP',
        'ENDERECO_CIDADE',
        'ENDERECO_ESTADO',
        'USUARIO_ID',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'USUARIO_ID', 'USUARIO_ID');
    }
}
