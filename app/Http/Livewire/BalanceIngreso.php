<?php

namespace App\Http\Livewire;
use App\Models\TipoIngreso;
use Livewire\Component;

class BalanceIngreso extends Component
{
    public function render()
    {
        $tipos = TipoIngreso::all();
        $meses = ['Enero'=> 'Enero','Febrero'=> 'Febrero','Marzo'=> 'Marzo',
        'Abril'=> 'Abril','Mayo'=> 'Mayo','Junio'=> 'Junio','Julio'=> 'Julio','Agosto'=>'Agosto','Setiembre'=> 'Setiembre',
        'Octubre' => 'Octubre','Noviembre'=> 'Noviembre','Diciembre'=> 'Diciembre'];

        return view('livewire.balance-ingreso',compact('meses','tipos'));
    }
}
