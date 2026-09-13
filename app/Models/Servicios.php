<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Servicios extends Model
{
    //

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'duracion_estimada',
    ];

    public function citas()
    {
        return $this->belongsToMany(Citas::class, 'cita_servicio', 'servicio_id', 'cita_id');
    }
}
