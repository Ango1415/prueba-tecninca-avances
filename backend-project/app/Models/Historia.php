<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesional',
        'paciente',
        'info_paciente',
        'estado_paciente',
        'antecedentes',
        'evolucion_final',
        'concepto',
        'recomendaciones',
    ];
}
