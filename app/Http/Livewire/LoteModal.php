<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\ListReportes;
use App\Models\Lote;
class LoteModal extends Component
{
    public $open = false;
    public $tituloModal = '';
    public $action = '';
    public $año = '';
    public $tituloBoton = '';
    public $id_lote;
    public $ingreso_importe_total = 0;
    public $egreso_importe_total = 0;
    public $liquidez = 0;
    public $estado = 'Generado';
    protected $listeners = [
        'abrirModal',
    ];

    protected function rules()

    {


        $resultados = array();
        for ($year = (int) date('Y'); 2100 >= $year; $year++){
            $resultados[$year] = $year;
         }
         $resultados= implode(",",$resultados);

        return [
        'año' => ['required',Rule::unique('lotes','año'),"in:{$resultados}"],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }





    public function render()
    {


        return view('livewire.lote-modal');
    }

    public function abrirModal()
    {


        $this->tituloModal = 'Nuevo Año';
        $this->open = true;
        $this->action = 'CrearAño';
        $this->tituloBoton = 'Crear';

    }
    public function cerrarModal(){
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }

    public function CrearAño(){
        $this->validate();
        Lote::create([
            'usuario_id' => auth()->user()->id,
            'año' => $this->año,
            'estado'=> 'Generado',

        ]);
        $id_lote = Lote::all();
        $this->id_lote = $id_lote->last()->id;
        $this->CrearMeses();
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();

        $this->emit('CrearAño');
    }
    public function CrearMeses(){
        $meses = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
        'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio','Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
        'Octubre' => 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'];
        foreach ($meses as  $mese) {
            ListReportes::create([
                'lote_id' => $this->id_lote,
                'mes' => $mese,
                'estado'=>$this->estado,
                'ingreso_importe_total' => $this->ingreso_importe_total,
                'egreso_importe_total' =>$this->egreso_importe_total,
                'liquidez' => $this->liquidez,
            ]);
        }

    }

}
