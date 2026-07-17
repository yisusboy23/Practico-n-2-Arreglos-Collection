<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $fillable = ['estudiante_id', 'tarea_id', 'nota', 'estado', 'fecha_entrega'];

    protected $casts = [
        'fecha_entrega' => 'datetime',
        'nota' => 'float',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }
}