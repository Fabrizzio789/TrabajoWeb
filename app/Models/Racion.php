<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Racion extends Model
{
    protected $fillable = [
        'beneficiario_id',
        'cantidad',
        'fecha'
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
