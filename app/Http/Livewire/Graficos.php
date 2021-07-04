<?php

namespace App\Http\Livewire;
use App\Models\ListReportes;
use Livewire\Component;

class Graficos extends Component
{
    public $foo;
    protected $listeners = [
        'DatosFiltro'
    ];
    public function render()
    {
        return view('livewire.graficos');
    }




    public function DatosFiltro($id){
        $meses = ['Enero','Febrero', 'Marzo',
         'Abril', 'Mayo', 'Junio', 'Julio','Agosto','Setiembre',
         'Octubre','Noviembre', 'Diciembre'];
        $datos = ListReportes::where('lote_id',$id)->get();

        $kk = array();
        $kk_egreso = array();
        $liquidez = array();
        foreach($datos as $key => $dato){
            $kk[$key] = $dato->ingreso_importe_total;
            $kk_egreso[$key] = $dato->egreso_importe_total;
            $liquidez[$key] = $dato->liquidez;
        }



        $this->emit('datosAño',$meses,$kk,$kk_egreso);
        $this->emit('datosLiquidez',$meses,$liquidez);

    }
}
