<?php

namespace App\Http\Livewire;
use App\Models\ListReportes;
use Livewire\Component;
use App\Models\Lote;
class FitroGraficos extends Component
{
    public $años;
    public $saldos;
    public $usuarios;
    public $ingreso_total;
    public $egreso_total;
    public $utilidad_total;
    public $lote_id;
    public function render()
    {
        return view('livewire.fitro-graficos');
    }

    public function getAñostotalProperty()
    {
        return Lote::all()->pluck('año');
    }

    public function updatedAños(){

        $this->datosCartas();
    }

    public function datosCartas(){
        if($this->años !== '' && $this->años !== null){
        $lote = Lote::where('año',$this->años)->get();
        $this->lote_id = $lote[0]->id;
        $this->saldos = $lote[0]->saldo;
        $datos = ListReportes::where('lote_id',$this->lote_id)->get();
        $kk = array();
        $kk_egreso = array();
        $liquidez = array();
        foreach($datos as $key => $dato){
            $kk[$key] = $dato->ingreso_importe_total;
            $kk_egreso[$key] = $dato->egreso_importe_total;
            $liquidez[$key] = $dato->liquidez;
        }
        $kk_total = array_sum($kk);
        $kk_total_egreso = array_sum($kk_egreso);
        $this->utilidad_total = array_sum($liquidez);
       $this->ingreso_total = $kk_total;
       $this->egreso_total = $kk_total_egreso;
       $this->emitTo('graficos','DatosFiltro',$this->lote_id);
     }
    }
}
