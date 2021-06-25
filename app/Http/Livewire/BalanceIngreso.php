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

    public $readyToLoad = false;

    public function render()
    {
        $tipos = TipoIngreso::all();
        $meses = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
        'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio','Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
        'Octubre' => 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'];

       /*  $total_importe_meses = array();
        foreach ($meses as  $mes) {
            $users = DB::table('ingresos')
            ->join('list_reportes', 'ingresos.id_ingreso_reportes', '=', 'list_reportes.id')
            ->join('lotes', 'ingresos.id_ingreso_reportes', '=', 'list_reportes.id')
            ->select('ingresos.*', 'list_reportes.*')
            ->where('list_reportes.mes','=',$mes)
            ->where('ingresos.tipo_importe','=','Aportacion /Guard. /InsCrip /Cuota Asamblea.')
            ->get();
         $meses_total = $users->sum('ingreso_importe');
         array_push($total_importe_meses  , $meses_total);
        }

        dd($total_importe_meses); */

        /* $orders = DB::table('ingresos')
                ->where('')
                ->where('tipo_importe','Aportacion /Guard. /InsCrip /Cuota Asamblea.')
                ->select('ingreso_importe')
                ->get();
                dd($orders->sum('ingreso_importe'));
 */
       /*  $ingreso = DB::table('ingresos')->where('tipo_importe', 'Aportacion /Guard. /InsCrip /Cuota Asamblea.')->sum('tipo_importe'); */

        return view('livewire.balance-ingreso',compact('meses','tipos'));
    }

    public function filtro($año){
     $tipos = ['Aportacion /Guard. /InsCrip /Cuota Asamblea.','Pago de Multas y Faenas.','Cancelacion de Deudas.','Aportacion Atrazadas Alquiler','Alumbrado Interno',
            'Alquiler','Ambulante','Consumo de Agua','SS.HH Limpieza Publica','Pago por Autovaluo','Aportacion por Actividad y Donaciones','Nuevos Socios Ingresos Varios','Ninguno'];


        $meses = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
        'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio','Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
        'Octubre' => 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'];
        $total_importe_meses = array();
        $total_final = array();
    foreach ($tipos as  $tipo) {
        foreach ($meses as  $mes) {
            $users = DB::table('list_reportes')
            ->join('lotes', 'list_reportes.lote_id', '=', 'lotes.id')
            ->join('ingresos', 'list_reportes.id', '=', 'ingresos.id_ingreso_reportes')
            ->select('ingresos.*', 'list_reportes.*','lotes.*')
            ->where('lotes.año','=',$año)
            ->where('list_reportes.mes','=',$mes)
            ->where('ingresos.tipo_importe','=',$tipo)
            ->get();
         $meses_total = $users->sum('ingreso_importe');
         $total_importe_meses[$mes] = $meses_total;

        }

        $total_final[$tipo] = $total_importe_meses;
    }

    $this->readyToLoad = true;
        return $total_final;
    }


}
