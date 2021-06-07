<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_egreso_reportes',
        'egreso_fecha',
        'egreso_codigo',
        'egreso_descripcion',
        'tipo_importe_egreso',
        'egreso_importe',

    ];
}
