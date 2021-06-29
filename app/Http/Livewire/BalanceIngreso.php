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
        'filtro',
        'saldoTotal',
        'saldoAnterior',
        'filtroSemestre',
        'filtroSemestreSegundo',
        'saldoTotalSemestre',
        'saldoTotalSemestreSegundo',
        'saldoAnteriorSemestre',
        'saldoAnteriorSemestreSegundo',
    ];


    public $total = [];
    public $total_final = [];
    public $saldo_ingreso;
    public $saldoTotal;
    public $saldo_anterior;
    /////////
    public $totalSemestre = [];
    public $total_finalSemestre = [];

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
        $this->emitTo('filtro','recuperarDatos',$kk_total);
    }

    public function filtroSemestre($año){

        $tipos = ['Aportacion /Guard. /InsCrip /Cuota Asamblea.','Pago de Multas y Faenas.','Cancelacion de Deudas.','Aportacion Atrazadas Alquiler','Aportacion Atrazadas Guard.','Alumbrado Interno',
        'Alquiler','Ambulante','Consumo de Agua','SS.HH Limpieza Publica','Pago por Autovaluo','Aportacion por Actividad y Donaciones','Nuevos Socios Ingresos Varios'];


           $meses = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
           'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio'];
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

    }

    public function filtroSemestreSegundo($año){
        $tipos = ['Aportacion /Guard. /InsCrip /Cuota Asamblea.','Pago de Multas y Faenas.','Cancelacion de Deudas.','Aportacion Atrazadas Alquiler','Aportacion Atrazadas Guard.','Alumbrado Interno',
        'Alquiler','Ambulante','Consumo de Agua','SS.HH Limpieza Publica','Pago por Autovaluo','Aportacion por Actividad y Donaciones','Nuevos Socios Ingresos Varios'];

           $meses = ['Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
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
    }

    public function saldoAnterior($id){
      $loco =  Lote::where('id','<',$id)->orderBy('id','desc')->limit(1)->get();
      $this->reset(['saldo_anterior']);
        if($loco->isEmpty() ){
            $this->saldo_anterior = null;
        }else{
            $saldo_anterior = $loco[0]->saldo;
            $this->saldo_anterior = $saldo_anterior;
            $this->total_final['Aportacion /Guard. /InsCrip /Cuota Asamblea.'] = $this->total_final['Aportacion /Guard. /InsCrip /Cuota Asamblea.'] + $saldo_anterior;

        }

    }
    public function saldoAnteriorSemestre($id){
        $loco =  Lote::where('id','<',$id)->orderBy('id','desc')->limit(1)->get();
        $this->reset(['saldo_anterior']);
          if($loco->isEmpty() ){
              $this->saldo_anterior = null;
          }else{

              $saldo_anterior = $loco[0]->saldo_segundo_semestre;
              $this->saldo_anterior = $saldo_anterior;
              $this->total_final['Aportacion /Guard. /InsCrip /Cuota Asamblea.'] = $this->total_final['Aportacion /Guard. /InsCrip /Cuota Asamblea.'] + $saldo_anterior;

          }
    }

    public function saldoAnteriorSemestreSegundo($id){
        $loco =  Lote::find($id);
        $this->reset(['saldo_anterior']);
        if($loco->saldo_semestre == null){
            $this->saldo_anterior = null;
        }else{
            $saldo_anterior = $loco->saldo_semestre;
            $this->saldo_anterior = $saldo_anterior;
             $this->total_final['Aportacion /Guard. /InsCrip /Cuota Asamblea.'] = $this->total_final['Aportacion /Guard. /InsCrip /Cuota Asamblea.'] + $saldo_anterior;
        }


    }

    public function saldoTotal($saldoEgreso){
        $this->saldo_ingreso = array_sum($this->total_final);
        $saldo  = $this->saldo_ingreso - $saldoEgreso;
        $this->saldoTotal = $saldo ;
        $this->emitTo('filtro','verSaldo',$saldo);

    }
    public function saldoTotalSemestre($saldoEgreso){
        $this->saldo_ingreso = array_sum($this->total_final);
        $saldo  = $this->saldo_ingreso - $saldoEgreso;
        $this->saldoTotal = $saldo ;
        $this->emitTo('filtro','verSaldoSemestre',$saldo);
    }
    public function saldoTotalSemestreSegundo($saldoEgreso){
        $this->saldo_ingreso = array_sum($this->total_final);
        $saldo  = $this->saldo_ingreso - $saldoEgreso;
        $this->saldoTotal = $saldo ;
        $this->emitTo('filtro','verSaldoSemestreSegundo',$saldo);
    }



}
