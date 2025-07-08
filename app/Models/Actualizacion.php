<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Actualizacion extends Model
{
    protected $table = 'actualizaciones';
    protected $fillable = [
        'equipo_id',
        'titulo',
        'descripcion',
    ];

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }
} 