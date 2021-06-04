<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ingresos;
use App\Models\TipoIngreso;
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
    public $show ;

    protected $listeners = [
        'editIngreso'  => 'kk',
    ];

    public function render()
    {



        $tipos = TipoIngreso::all();
        $tipos = $tipos->sortBy('Descripcion');
        return view('livewire.formulario',[
            'tipos'=> $tipos,
        ]);
    }


    public function save(){
        Ingresos::create([
            'id_ingreso_reportes' => $this->id_reporte,
            'ingreso_fecha' => $this->ingreso_fecha,
            'ingreso_codigo' => $this->ingreso_codigo,
            'ingreso_descripcion'=>$this->ingreso_descripcion,
            'tipo_importe' => $this->tipo_importe,
            'ingreso_importe' =>$this->ingreso_importe,

        ]);
        $this->reset(['ingreso_fecha','ingreso_codigo','ingreso_descripcion','tipo_importe','ingreso_importe']);
        $this->emit('reporteList');
    }
    public function mount(){
        $this->show = 'false';
    }

    public function hydrate(){
        $this->show = 'false';
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

    }

    public function update(){

        $license = Ingresos::find($this->ingreso_id);

        $license->update([
            'id_ingreso_reportes' => $this->id_ingreso_reportes ,
            'ingreso_fecha'    => $this->ingreso_fecha   ,
            'ingreso_codigo' => $this->ingreso_codigo,
            'ingreso_descripcion' => $this->ingreso_descripcion,
            'tipo_importe'     => $this->tipo_importe,
            'ingreso_importe'     => $this->ingreso_importe,
        ]);
            $this->hydrate();
        $this->reset(['ingreso_fecha','ingreso_codigo','ingreso_descripcion','tipo_importe','ingreso_importe']);
        $this->emit('IngresosList');

    }

}
