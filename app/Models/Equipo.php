<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipo extends Model
{
    protected $fillable = [
        'tecnico_id',
        'negocio_id',
        'estadoEquipo',
        'tipoDeEquipo',
        'marcaEquipo',
        'danioEquipo',
        'accesoriosEquipo',
        'imagenesEquipo',
        'modeloEquipo',
        'observacionesEquipo',
        'numeroDeSerieEquipo',
        'fechaLlegada',
        'fechaSalida',
    ];

    public function tecnico(): BelongsTo
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function negocio()
    {
        return $this->belongsTo(Negocio::class);
    }
}