<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lote;
use PDF;
use App\Models\TipoIngreso;
use App\Models\Ingresos;
use Illuminate\Support\Facades\DB;
use App\Models\Egresos;
use App\Models\TipoEgreso;
class Filtro extends Component
{
    public $show = false;
    public $viewSaldo = false;
    public $tipo = '' ;
    public $tipo_año;
    public $saldo ;
    public $lote;
    ////////////////////////////////////////////////////////////////
    public $test = [];

    protected $listeners = [
        'verSaldo'=> 'guardarSaldo',
        'verSaldoSemestre'=> 'guardarSaldoSemestre',
        'verSaldoSemestreSegundo' => 'guardarSaldoSemestreSegundo',
        'recuperarDatos',

    ];

    protected function rules()
    {
        $tipos = Lote::where('estado','Terminado')->pluck('año');
        $tipos = $tipos->join(',');

        $tipo_año = "Anual,Semestral,SemestralSegundo";

        return [
            'tipo' => "required|in:{$tipo_año}",
            'tipo_año'=> "required|in:{$tipos}",
        ];
    }

    protected $rules = [
        'tipo' => 'required',
        'tipo_año'=> 'required',

    ];

    protected $validationAttributes = [
        'tipo' => 'Tipo de Balance',
        'tipo_año' => 'Año'
    ];


    public function render()
    {


        return view('livewire.filtro');
    }

    public function kk(){
        $this->show = false;
        $this->viewSaldo = false;
    }



    public function getAñosProperty()
    {
        return Lote::where('estado','Terminado')->pluck('año');
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
        if($this->tipo !== ''){
            $this->show = true;
        }else{
            $this->show = false;
        }
    }

    public function buscar(){
        $this->validate();
        $lote = Lote::where('año',$this->tipo_año)->get();
        $this->lote = $lote[0]->id;
        if($this->tipo == 'Anual'){
        $this->emitTo('balance-ingreso','filtro',$this->tipo_año);
        $this->emitTo('balance-egreso','filtro',$this->tipo_año);
        $this->emitTo('balance-egreso','sumarSaldo');
        $this->emitTo('balance-ingreso','saldoAnterior',$lote[0]->id);
        }elseif($this->tipo == 'Semestral'){
            $this->emitTo('balance-ingreso','filtroSemestre',$this->tipo_año);
            $this->emitTo('balance-egreso','filtroSemestre',$this->tipo_año);
            $this->emitTo('balance-egreso','sumarSaldoSemestre');
            $this->emitTo('balance-ingreso','saldoAnteriorSemestre',$lote[0]->id);

        }elseif($this->tipo == 'SemestralSegundo'){
            $this->emitTo('balance-ingreso','filtroSemestreSegundo',$this->tipo_año);
            $this->emitTo('balance-egreso','filtroSemestreSegundo',$this->tipo_año);
            $this->emitTo('balance-egreso','sumarSaldoSemestreSegundo');
            $this->emitTo('balance-ingreso','saldoAnteriorSemestreSegundo',$lote[0]->id);
        }


    }

    public function guardarSaldo($value){
        $this->saldo = $value;
        $this->viewSaldo = true;
        $license = Lote::find($this->lote);
        $id = $license->id;
        $license->update([
            'id' =>$id,
            'saldo' => $value,
        ]);

    }

    public function guardarSaldoSemestre($value){
        $this->saldo = $value;
        $this->viewSaldo = true;
        $license = Lote::find($this->lote);
        $id = $license->id;
        $license->update([
            'id' =>$id,
            'saldo_semestre' => $value,
        ]);
    }

    public function guardarSaldoSemestreSegundo($value){
        $this->saldo = $value;
        $this->viewSaldo = true;
        $license = Lote::find($this->lote);
        $id = $license->id;
        $license->update([
            'id' =>$id,
            'saldo_segundo_semestre' => $value,
        ]);
    }

    public function recuperarDatos($datos = array()) {
        $this->test = $datos;
        $this->emit('datosTest',$datos);
    }



    public function test()
    {

        return redirect()->route('balancePdf' ,[ $this->lote , $this->tipo]);
    }

    public function GenerarPdf($id ,$tipo ){
        $lote = Lote::find($id);
        $año = $lote->año;
        $tipos = TipoIngreso::all();
        $tiposE = TipoEgreso::all();
        if($tipo == 'Anual'){
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
        $total = array();
         $total = $total_final;
            foreach ($tipos as  $value) {
            foreach($total as $key => $aea){
             $kk[$key] = $aea[$value];
             $kk_total[$value] = array_sum($kk);
            }
          }
        $total_final = array();
        $total_final = $kk_total;

///////////////////////////////////////////////////////

        $tiposE = ['Directiva Pagos de Socios','Fondo de Salud','Tributo','Honorarios Guardiania Baño Cobranza','Servicios Publicos',
        'Articulos de Ferreteria','Articulos de Aseo y Proteccion Personal','Articulos de Oficina','Servic. de Impresion y Copias','Gatos Notariable S/pago de Autovalu',
        'Servicios Profesionales','Gastos Varios','Mant. Y Reparacion'];
       $mesesE = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
       'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio','Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
       'Octubre' => 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'];
       $total_importe_mesesE = array();
       $total_finalE = array();
       $kkE = array();
       $kk_totalE = array();
     foreach ($mesesE as  $mesE) {
        foreach ($tiposE as  $tipoE) {
           $usersE = DB::table('list_reportes')
           ->join('lotes', 'list_reportes.lote_id', '=', 'lotes.id')
           ->join('egresos', 'list_reportes.id', '=', 'egresos.id_egreso_reportes')
           ->select('egresos.*', 'list_reportes.*','lotes.*')
           ->where('lotes.año','=',$año)
           ->where('list_reportes.mes','=',$mesE)
           ->where('egresos.tipo_importe_egreso','=',$tipoE)
           ->get();
        $meses_totalE = $usersE->sum('egreso_importe');
        $total_importe_mesesE[$tipoE] = $meses_totalE;

       }

       $total_finalE[$mesE] = $total_importe_mesesE;
   }

        $totalE = array();
        $totalE = $total_finalE;

           foreach ($tiposE as  $valueE) {
           foreach($totalE as $keyE => $aeaE){
            $kkE[$keyE] = $aeaE[$valueE];
            $kk_totalE[$valueE] = array_sum($kkE);
           }
       }
       $total_finalE = array();
       $total_finalE = $kk_totalE;


          $saldo = $lote->saldo;

          $loco =  Lote::where('id','<',$id)->orderBy('id','desc')->limit(1)->get();
          $año_atras = $loco[0]->año;
            if($loco->isEmpty() ){
                $saldo_anterior = null;
            }else{
                $saldo_anterior = $loco[0]->saldo;
                $total_final['Aportacion /Guard. /InsCrip /Cuota Asamblea.'] = $total_final['Aportacion /Guard. /InsCrip /Cuota Asamblea.'] + $saldo_anterior;

            }

        }











        $pdf = PDF::loadView('users.pdfBalance',compact('total','total_final','tipos','año','tiposE','totalE','total_finalE','saldo','saldo_anterior','año_atras'));
        return  $pdf->setPaper('a4','landscape')->stream('balance.'.date('y-m-d').'.pdf');

    }

}
