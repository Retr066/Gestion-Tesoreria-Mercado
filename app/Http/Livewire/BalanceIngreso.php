<?php

namespace App\Http\Livewire;
use App\Models\TipoIngreso;
use Livewire\Component;
use App\Models\Ingresos;
use App\Models\Lote;
use Illuminate\Support\Facades\DB;
class BalanceIngreso extends Component
{

    protected $listeners = [
        'filtro'
    ];


    public $total = [];
    public $total_final = [];

    public function render()
    {
        $tipos = TipoIngreso::all();
        $meses = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
        'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio','Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
        'Octubre' => 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'];

        return view('livewire.balance-ingreso',compact('meses','tipos'));
    }

    public function filtro($año){
     $tipos = ['Aportacion /Guard. /InsCrip /Cuota Asamblea.','Pago de Multas y Faenas.','Cancelacion de Deudas.','Aportacion Atrazadas Alquiler','Aportacion Atrazadas Guard.','Alumbrado Interno',
     'Alquiler','Ambulante','Consumo de Agua','SS.HH Limpieza Publica','Pago por Autovaluo','Aportacion por Actividad y Donaciones','Nuevos Socios Ingresos Varios'];


        $meses = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
        'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio','Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
        'Octubre' => 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'];
        $total_importe_meses = array();
        $total_final = array();
        $kk = array();
        $kk_total = array();
    foreach ($meses as  $mes) {
        foreach ($tipos as  $tipo) {
            $users = DB::table('list_reportes')
            ->join('lotes', 'list_reportes.lote_id', '=', 'lotes.id')
            ->join('ingresos', 'list_reportes.id', '=', 'ingresos.id_ingreso_reportes')
            ->select('ingresos.*', 'list_reportes.*','lotes.*')
            ->where('lotes.año','=',$año)
            ->where('list_reportes.mes','=',$mes)
            ->where('ingresos.tipo_importe','=',$tipo)
            ->get();
         $meses_total = $users->sum('ingreso_importe');
         $total_importe_meses[$tipo] = $meses_total;

        }

        $total_final[$mes] = $total_importe_meses;
    }


         $this->total = $total_final;

            foreach ($tipos as  $value) {
            foreach($this->total as $key => $aea){
             $kk[$key] = $aea[$value];
             $kk_total[$value] = array_sum($kk);
            }
        }

        $this->total_final = $kk_total;

         return  $this->total;


    }


}
