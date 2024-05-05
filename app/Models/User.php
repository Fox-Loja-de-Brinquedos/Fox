<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'USUARIO_ID'; // Substitua 'SEU_ID_PRIMARIO' pelo nome da sua chave primária


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The name of the table associated with the model.
     *
     * @var string
     */
    protected $table = 'USUARIO';
    
    protected $fillable = [
        'USUARIO_EMAIL',
        'USUARIO_SENHA',
        'USUARIO_NOME',
        'USUARIO_CPF',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'USUARIO_SENHA', // Esconda o campo de senha
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}