<?php

namespace App\Models;
use App\Models\Egresos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEgreso extends Model
{
    use HasFactory;
    protected $fillable = [
       /*  'egreso_id', */
        'Descripcion',
    ];

   /*  public function r_egresos()
    {
        return $this->belongsTo(Egresos::class, 'egreso_id', 'id');
    } */
}
