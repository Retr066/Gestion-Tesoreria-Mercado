<?php

namespace App\Http\Livewire;
use App\Models\ListReportes;
use Livewire\Component;

class ReporteModal extends Component
{
    public $open = false;
    public $tituloModal = '';
    public $action = '';
    public $description = '';
    public $mes = '';
    public $id_reporte; //id del reportelist que le das a editar
    public $ingreso_importe_total = 0;
    public $egreso_importe_total = 0;
    public $liquidez = 0;
    public $estado = 'Generado';
    public $tituloBoton = '';

    protected $listeners = [
        'abrirModal',
        'editReporte' => 'editReporte',
    ];

    protected function rules()
    {
        $tipos = "Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Setiembre,Noviembre,Octubre,Diciembre";

        return [
        'description' => 'required|min:3|max:100',
        'mes' => "required|in:{$tipos}",
        ];
    }
    protected $validationAttributes = [
        'description' => 'Descripcion',
        'mes' => 'Mes',

    ];


    public function render()
    {
        $meses = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
        'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio','Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
        'Octubre' => 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'];

        return view('livewire.reporte-modal',[
            'meses' =>$meses,
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function abrirModal()
    {
        $this->tituloModal = 'Nuevo Reporte';
        $this->open = true;
        $this->action = 'CrearReporte';
        $this->tituloBoton = 'Crear Reporte';
    }
    public function cerrarModal(){
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }

    public function CrearReporte(){
        $this->validate();
        ListReportes::create([
            'id' => $this->id_reporte,
            'usuario_id' => auth()->user()->id,
            'description' => $this->description,
            'mes' => $this->mes,
            'estado'=>$this->estado,
            'ingreso_importe_total' => $this->ingreso_importe_total,
            'egreso_importe_total' =>$this->egreso_importe_total,
            'liquidez' => $this->liquidez,

        ]);
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('CrearReporte');
    }


    public function editReporte(ListReportes $reporte){
        $this->tituloModal = 'Actualizar Reporte';
        $this->open = true;
        $this->action = 'Actualizar Reporte';
        $this->tituloBoton = 'Actualizar Reporte';
        $this->id_reporte = $reporte->id;
        $this->description = $reporte->description;
        $this->mes = $reporte->mes;
    }

    public function guardaReporte(){
        $this->validate();
        $license = ListReportes::find($this->id_reporte);

        $license->update([
            'id' => $this->id_reporte,
            'description' => $this->description,
            'mes'    => $this->mes ,

        ]);

        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();

        $this->emit('guardaReporte');
    }
}
