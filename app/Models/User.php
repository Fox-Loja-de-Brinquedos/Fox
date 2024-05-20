<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //RELACAO COM A TABELA ENDERECO
    public function endereco(): HasOne
    {
        return $this->hasOne(Endereco::class, 'USUARIO_ID', 'USUARIO_ID');
    }
    protected $primaryKey = 'USUARIO_ID';

    public $timestamps = false;

    protected $table = 'USUARIO';
    
    protected $fillable = [
        'USUARIO_EMAIL',
        'USUARIO_SENHA',
        'USUARIO_NOME',
        'USUARIO_CPF',
    ];

    protected $hidden = [
        'USUARIO_SENHA', // Esconda o campo de senha
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
}