<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lote;
use PDF;
class Filtro extends Component
{
    public $show = false;
    public $viewSaldo = false;
    public $tipo = '' ;
    public $tipo_año;
    public $saldo ;
    public $lote;
    ////////////////////////////////////////////////////////////////
    public $total_final = [];

    protected $listeners = [
        'verSaldo'=> 'guardarSaldo',
        'verSaldoSemestre'=> 'guardarSaldoSemestre',
        'verSaldoSemestreSegundo' => 'guardarSaldoSemestreSegundo',
        'recuperarDatos'
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

    public function mount(){
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
        $this->total_final = $datos;
    }

    public function GenerarPdf($id){
        $lote = Lote::find($id);
        $date = $lote->año;
        $total_final = array();
        $total_final = $this->total_final;
        dd($total_final);
        $pdf = PDF::loadView('users.pdfBalance',compact('lote','date'));
        return  $pdf->setPaper('a4','landscape')->stream('balance.'.date('y-m-d').'.pdf');
    }

}
