<?php

namespace App\Models;
use App\Models\Ingresos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIngreso extends Model
{
    use HasFactory;
    protected $fillable = [
      /*   'ingreso_id', */
        'Descripcion',
    ];

   /*  public function r_ingresos()
    {
        return $this->belongsTo(Ingresos::class, 'ingreso_id', 'id');
    } */
}
