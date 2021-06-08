<?php

namespace App\Http\Livewire;
use App\Models\TipoIngreso;
use App\Models\TipoEgreso;
use Livewire\Component;
use App\Models\Egresos;
use Illuminate\Support\Facades\DB;
use App\Models\ListReportes;
class FormularioEgreso extends Component
{

    public $id_egreso_reportes;
    public $egreso_fecha = '';
    public $egreso_codigo = '';
    public $egreso_descripcion = '';
    public $egreso_importe = '';
    public $tipo_importe_egreso = '';
    public $id_reporte_egreso;
    public $sum_importe;
    public $egreso_id = null;
    public $open = 'hidden';
    public $open2 = '';
    public $estado = 'Proceso';
    public $liquidez = '';
    protected $listeners = [
        'editEgreso'  => 'RecuperarDatos',
    ];
    protected function rules()
    {
        $tipos = TipoEgreso::pluck('Descripcion');
        $tipos = $tipos->join(',');
        return [
            'egreso_fecha' => 'required|date',
        'egreso_codigo' => 'required|string|min:2|max:15',
        'egreso_descripcion' => 'required|string|min:3|max:100',
        'tipo_importe_egreso' => "required|in:{$tipos}",
        'egreso_importe' => 'required|numeric|min:0|max:1000000',
        ];
    }


    protected $messages = [
        'egreso_importe.max' => 'El campo :attribute no debe ser mayor a 1000000 de soles.',

    ];

    protected $validationAttributes = [
        'egreso_fecha' => 'fecha',
        'egreso_codigo' => 'Recibo',
        'egreso_descripcion' => 'Descripcion',
        'tipo_importe_egreso' => 'Tipo',
        'egreso_importe' => 'Importe',
    ];

    public function render()
    {
        $tipos = TipoEgreso::all();
        $tipos = $tipos->sortBy('Descripcion');

        return view('livewire.formulario-egreso',[
            'tipos'=> $tipos,
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function mount(){
        $this->open;
    }
    public function saveEgreso(){

        $this->validate();


       Egresos::create([
            'id_egreso_reportes' => $this->id_reporte_egreso,
            'egreso_fecha' => $this->egreso_fecha,
            'egreso_codigo' => $this->egreso_codigo,
            'egreso_descripcion'=>$this->egreso_descripcion,
            'tipo_importe_egreso' => $this->tipo_importe_egreso,
            'egreso_importe' =>$this->egreso_importe,

        ]);
        $this->suma($this->id_reporte_egreso);
        $this->reset(['egreso_fecha','egreso_codigo','egreso_descripcion','tipo_importe_egreso','egreso_importe']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('saveEgreso');
    }

    public function RecuperarDatos(Egresos $egreso_id){

        $this->egreso_id = $egreso_id->id;
        $this->id_egreso_reportes = $egreso_id->id_egreso_reportes;
        $this->egreso_fecha = $egreso_id->egreso_fecha;
        $this->egreso_codigo = $egreso_id->egreso_codigo;
        $this->egreso_descripcion = $egreso_id->egreso_descripcion;
        $this->tipo_importe_egreso = $egreso_id->tipo_importe_egreso;
        $this->egreso_importe = $egreso_id->egreso_importe;
        $this->open = '';
        $this->open2 = 'hidden';
    }
    public function updateEgreso(){
        $this->validate();
        $license = Egresos::find($this->egreso_id);

        $license->update([
            'id_egreso_reportes' => $this->id_egreso_reportes,
            'egreso_fecha'    => $this->egreso_fecha,
            'egreso_codigo' => $this->egreso_codigo,
            'egreso_descripcion' => $this->egreso_descripcion,
            'tipo_importe_egreso'     => $this->tipo_importe_egreso,
            'egreso_importe'     => $this->egreso_importe,
        ]);
        $this->suma($this->id_reporte_egreso);
        $this->reset(['egreso_fecha','egreso_codigo','egreso_descripcion','tipo_importe_egreso','egreso_importe']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->open = 'hidden';
        $this->open2 = '';
        $this->ActiveButtonDelete();
        $this->emit('updateEgreso');
    }

    public function ActiveButtonDelete()
    {

        $this->emit('ActiveButtonDelete');
    }


    public function suma($id_reporte){
        $ingreso = DB::table('ingresos')->where('id_ingreso_reportes', $id_reporte)->sum('ingreso_importe');
        $egreso = DB::table('egresos')->where('id_egreso_reportes', $id_reporte)->sum('egreso_importe');
        $this->sum_importe = $egreso;
        $this->liquidez = $ingreso - $egreso;
        $license = ListReportes::find($id_reporte);
        $license->update([
                'id' => $id_reporte,
                'egreso_importe_total' => $this->sum_importe,
                'estado' => $this->estado,
                'liquidez' => $this->liquidez,
        ]);
    }




}
