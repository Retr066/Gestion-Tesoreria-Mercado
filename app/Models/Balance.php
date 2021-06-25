<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
    protected $fillable = [
        'lote_id',
        'sum_aportacion',
        'sum_multas',
        'sum_deudas',
        'sum_alquiler',
        'sum_guard',
        'sum_interno',
        'sum_alquiler',
        'sum_ambulante',
        'sum_agua',
        'sum_publica',
        'sum_autovaluo',
        'sum_donaciones',
        'sum_varios',
    ];
}
