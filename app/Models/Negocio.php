<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Negocio extends Model
{
    protected $fillable = [
        'nombreNegocio',
        'numeroNegocio',
        'correoNegocio'
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}