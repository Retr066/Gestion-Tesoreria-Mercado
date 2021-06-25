<?php

namespace App\Models;
use  App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;
    protected $fillable = [
        'usuario_id',
        'año',
        'estado',
    ];

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
