<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReporteModal extends Component
{
    public $open = false;
    public $tituloModal = '';

    protected $listeners = [
        'abrirModal',
    ];
    public function render()
    {
        return view('livewire.reporte-modal');
    }

    public function abrirModal()
    {
        $this->tituloModal = 'Nuevo Reporte';
        $this->open = true;
    }
    public function cerrarModal(){
        $this->open = false;
    }
}
