<?php

namespace App\Models;
use App\Models\Ingresos;
use App\Models\Egresos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListReportes extends Model
{
    use HasFactory;
    protected $fillable = [
        'lote_id',
        'estado',
        'mes',
        'ingreso_importe_total',
        'egreso_importe_total',
        'liquidez',
    ];
    public function r_ingresos()
    {
        return $this->hasMany(Ingresos::class,'id_ingreso_reportes','id');
    }
    public function r_egresos()
    {
        return $this->hasMany(Egresos::class,'id_egreso_reportes','id');
    }
    public function r_user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function scopeEstado($query ,$role){
        if ($role == '') {
        return;
        }

        return $query->where('estado',$role);
    }

}
