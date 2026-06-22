<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $table = 'beneficiarios';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'telefono',
        'direccion'
    ];
}