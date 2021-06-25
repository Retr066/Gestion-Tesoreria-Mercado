<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lote;
class Filtro extends Component
{
    public $show = false;
    public $show2 = false;
    public $test = '' ;
    public $tipo_año;


    public function render()
    {


        return view('livewire.filtro');
    }

    public function getAñosProperty()
    {
        return Lote::where('estado','Terminado')->pluck('año');
    }

    public function updated(){
        if($this->test == 1){
            $this->show = true;
            $this->show2 = false;

        }elseif($this->test == 2){
            $this->show2 = true;
            $this->show = false;
        }
    }

    public function buscar(){

        $this->emitTo('balance-ingreso','filtro',$this->tipo_año);
    }
}
