<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    //
    protected $fillable = [
        'user_id',
        'servicio_id',
        'fecha_hora',
        'estado',
        'total',
        'nota',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicios::class, 'cita_servicio', 'cita_id', 'servicio_id');
    }
}
