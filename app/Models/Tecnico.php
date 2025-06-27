<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tecnico extends Model
{
    protected $fillable = [
        'nombre',
        'apellidos',
        'numero'
    ];

    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class);
    }
}