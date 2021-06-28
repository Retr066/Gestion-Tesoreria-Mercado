<?php

namespace App\Http\Livewire;
use App\Models\TipoEgreso;
use Livewire\Component;
use App\Models\Egresos;
use App\Models\Lote;
use Illuminate\Support\Facades\DB;
class BalanceEgreso extends Component
{
    protected $listeners = [
        'filtro',
        'sumarSaldo',
        'filtroSemestre',
        'filtroSemestreSegundo',
        'sumarSaldoSemestre',
        'sumarSaldoSemestreSegundo'
    ];


    public $total = [];
    public $total_final = [];
    public $saldo_egreso ;



    public function render()
    {
        $tipos = TipoEgreso::all();
        $meses = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
        'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio','Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
        'Octubre' => 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'];

        return view('livewire.balance-egreso',compact('meses','tipos'));
    }

    public function filtro($año){
        $tipos = ['Directiva Pagos de Socios','Fondo de Salud','Tributo','Honorarios Guardiania Baño Cobranza','Servicios Publicos',
        'Articulos de Ferreteria','Articulos de Aseo y Proteccion Personal','Articulos de Oficina','Servic. de Impresion y Copias','Gatos Notariable S/pago de Autovalu',
        'Servicios Profesionales','Gastos Varios','Mant. Y Reparacion'];


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
               ->join('egresos', 'list_reportes.id', '=', 'egresos.id_egreso_reportes')
               ->select('egresos.*', 'list_reportes.*','lotes.*')
               ->where('lotes.año','=',$año)
               ->where('list_reportes.mes','=',$mes)
               ->where('egresos.tipo_importe_egreso','=',$tipo)
               ->get();
            $meses_total = $users->sum('egreso_importe');
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

       public function filtroSemestre($año){

        $tipos = ['Directiva Pagos de Socios','Fondo de Salud','Tributo','Honorarios Guardiania Baño Cobranza','Servicios Publicos',
        'Articulos de Ferreteria','Articulos de Aseo y Proteccion Personal','Articulos de Oficina','Servic. de Impresion y Copias','Gatos Notariable S/pago de Autovalu',
        'Servicios Profesionales','Gastos Varios','Mant. Y Reparacion'];


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
               ->join('egresos', 'list_reportes.id', '=', 'egresos.id_egreso_reportes')
               ->select('egresos.*', 'list_reportes.*','lotes.*')
               ->where('lotes.año','=',$año)
               ->where('list_reportes.mes','=',$mes)
               ->where('egresos.tipo_importe_egreso','=',$tipo)
               ->get();
            $meses_total = $users->sum('egreso_importe');
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
        $tipos = ['Directiva Pagos de Socios','Fondo de Salud','Tributo','Honorarios Guardiania Baño Cobranza','Servicios Publicos',
        'Articulos de Ferreteria','Articulos de Aseo y Proteccion Personal','Articulos de Oficina','Servic. de Impresion y Copias','Gatos Notariable S/pago de Autovalu',
        'Servicios Profesionales','Gastos Varios','Mant. Y Reparacion'];


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
               ->join('egresos', 'list_reportes.id', '=', 'egresos.id_egreso_reportes')
               ->select('egresos.*', 'list_reportes.*','lotes.*')
               ->where('lotes.año','=',$año)
               ->where('list_reportes.mes','=',$mes)
               ->where('egresos.tipo_importe_egreso','=',$tipo)
               ->get();
            $meses_total = $users->sum('egreso_importe');
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

       public function sumarSaldo(){
        $this->saldo_egreso = array_sum($this->total_final);
        $this->emitTo('balance-ingreso','saldoTotal',$this->saldo_egreso);
       }
       public function sumarSaldoSemestre(){
        $this->saldo_egreso = array_sum($this->total_final);
        $this->emitTo('balance-ingreso','saldoTotalSemestre',$this->saldo_egreso);
       }
       public function sumarSaldoSemestreSegundo(){
        $this->saldo_egreso = array_sum($this->total_final);
        $this->emitTo('balance-ingreso','saldoTotalSemestreSegundo',$this->saldo_egreso);
       }
}
