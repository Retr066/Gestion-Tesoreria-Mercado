<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ComponentModal extends Component
{
    public $showModal;
    public $action;
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $showModal,string $action,string $color)
    {
        $this->showModal = $showModal;
        $this->action = $action;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.component-modal');
    }
}
