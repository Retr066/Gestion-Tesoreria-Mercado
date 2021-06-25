<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalLayout extends Component
{

    public $open;
    public $tituloModal;
    public $action;
    public $tituloBoton;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $open ,string $tituloModal,string $action,string $tituloBoton)
    {
       $this->open = $open;
       $this->tituloModal = $tituloModal;
       $this->action = $action;
       $this->tituloBoton = $tituloBoton;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-layout');
    }
}
