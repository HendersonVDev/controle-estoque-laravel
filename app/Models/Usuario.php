<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'nome',
        'sobrenome',
        'fone',
        'nivel',
        'status',
        'email',
        'password',
    ];
}
