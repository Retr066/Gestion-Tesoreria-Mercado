<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = [
        'userListUpdate' => 'render',

    ];

    public function render()
    {
        return view('livewire.sidebar');
    }
}
