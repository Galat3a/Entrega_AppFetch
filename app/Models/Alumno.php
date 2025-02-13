<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alumno extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'edad'
    ];

    // Obtiene las prácticas asociadas al alumno. Relación uno a muchos con Practica
    public function practicas(): HasMany
    {
        return $this->hasMany(Practica::class, 'alumno_id');
    }
}