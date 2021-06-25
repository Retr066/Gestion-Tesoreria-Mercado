<?php

namespace App\Http\Livewire;
use App\Models\TipoIngreso;
use Livewire\Component;
use App\Models\Ingresos;
use App\Models\Lote;
use Illuminate\Support\Facades\DB;
use App\Models\ListReportes;
class Formulario extends Component
{

    public $id_ingreso_reportes;
    public $ingreso_fecha = '';
    public $ingreso_codigo = '';
    public $ingreso_descripcion = '';
    public $tipo_importe = '';
    public $ingreso_importe = '';
    public $id_reporte;
    public $ingreso_id = null;
    public $open = 'hidden';
    public $open2 = '';
    public $can_submit;
    public $sum_importe;
    public $estado = 'Proceso';
    public $liquidez = '';

    protected $listeners = [
        'editIngreso'  => 'kk',
    ];



    protected function rules()
    {
        $tipos = TipoIngreso::pluck('Descripcion');
        $tipos = $tipos->join(',');
        return [
        'ingreso_fecha' => 'required|date',
        'ingreso_codigo' => 'required|string|min:2|max:15',
        'ingreso_descripcion' => 'required|string|min:3|max:100',
        'tipo_importe' => "required|in:{$tipos}",
        'ingreso_importe' => 'required|numeric|min:0|max:1000000',
        ];
    }


    protected $messages = [
        'ingreso_importe.max' => 'El campo :attribute no debe ser mayor a 1000000 de soles.',

    ];

    protected $validationAttributes = [
        'ingreso_fecha' => 'Fecha',
        'ingreso_codigo' => 'Recibo',
        'ingreso_descripcion' => 'Descripcion',
        'tipo_importe' => 'Tipo',
        'ingreso_importe' => 'Importe',
    ];

    public function render()
    {

        $tipos = TipoIngreso::all();
        $tipos = $tipos->sortBy('Descripcion');
        return view('livewire.formulario',[
            'tipos'=> $tipos,
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function save(){

        $this->validate();


        Ingresos::create([
            'id_ingreso_reportes' => $this->id_reporte,
            'ingreso_fecha' => $this->ingreso_fecha,
            'ingreso_codigo' => $this->ingreso_codigo,
            'ingreso_descripcion'=>$this->ingreso_descripcion,
            'tipo_importe' => $this->tipo_importe,
            'ingreso_importe' =>$this->ingreso_importe,

        ]);
        $this->suma($this->id_reporte);
        $this->reset(['ingreso_fecha','ingreso_codigo','ingreso_descripcion','tipo_importe','ingreso_importe']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('reporteList');
    }
    public function mount(){
        $this->open;
    }


    public function kk(Ingresos $ingreso_id){
        /* $ingreso = Ingresos::findOrFail($ingreso_id); */
        $this->ingreso_id = $ingreso_id->id;
        $this->id_ingreso_reportes = $ingreso_id->id_ingreso_reportes;
        $this->ingreso_fecha = $ingreso_id->ingreso_fecha;
        $this->ingreso_codigo = $ingreso_id->ingreso_codigo;
        $this->ingreso_descripcion = $ingreso_id->ingreso_descripcion;
        $this->tipo_importe = $ingreso_id->tipo_importe;
        $this->ingreso_importe = $ingreso_id->ingreso_importe;
        $this->open = '';
        $this->open2 = 'hidden';
    }

    public function update(){
        $this->validate();
        $license = Ingresos::find($this->ingreso_id);

        $license->update([
            'id_ingreso_reportes' => $this->id_ingreso_reportes ,
            'ingreso_fecha'    => $this->ingreso_fecha   ,
            'ingreso_codigo' => $this->ingreso_codigo,
            'ingreso_descripcion' => $this->ingreso_descripcion,
            'tipo_importe'     => $this->tipo_importe,
            'ingreso_importe'     => $this->ingreso_importe,
        ]);





        $this->suma($this->id_reporte);
        $this->reset(['ingreso_fecha','ingreso_codigo','ingreso_descripcion','tipo_importe','ingreso_importe']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->open = 'hidden';
        $this->open2 = '';
        $this->cambio();
        $this->emit('IngresosList',$this->can_submit);


    }

    public function suma($id_reporte){
        $ingreso = DB::table('ingresos')->where('id_ingreso_reportes', $id_reporte)->sum('ingreso_importe');
        $egreso = DB::table('egresos')->where('id_egreso_reportes', $id_reporte)->sum('egreso_importe');
        $this->sum_importe = $ingreso;
        $this->liquidez = $ingreso - $egreso;
        $license = ListReportes::find($id_reporte);
        $license->update([
                'id' => $id_reporte,
                'ingreso_importe_total' => $this->sum_importe,
                'estado' => $this->estado,
                'liquidez' => $this->liquidez,
        ]);
        $id = $license->lote_id;
        $lote = Lote::find($id);
        $lote->update([
            'id' => $id,
            'estado' => 'Proceso'
        ]);


    }




    public function cambio()
    {
        $this->can_submit = true;
        $this->emit('cambio');
    }





}
