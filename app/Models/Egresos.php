<?php

namespace App\Models;

use App\Models\TipoEgreso;
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

    public function r_tipoEgreso()
    {
        return $this->hasOne(TipoEgreso::class,'tipo_importe_egreso','id');
    }
}
