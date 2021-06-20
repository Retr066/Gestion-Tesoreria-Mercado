<?php

namespace App\Models;
use App\Models\TipoIngreso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingresos;
class Ingresos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ingreso_reportes',
        'ingreso_fecha',
        'ingreso_codigo',
        'ingreso_descripcion',
        'tipo_importe',
        'ingreso_importe',
    ];

    public function r_tipoIngreso()
    {
        return $this->hasOne(TipoIngreso::class,'tipo_importe','id');
    }
}
