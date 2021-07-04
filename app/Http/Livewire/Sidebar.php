<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class Sidebar extends Component
{
    public $role;
    protected $listeners = [
        'userListUpdate' => 'render',

    ];

    public function render()
    {

        return view('livewire.sidebar');
    }

    public function mount(){
        $rol_user = auth()->user()->getRoleNames();

        if($rol_user->isEmpty()){
            $this->role = 'No tienes Roles';
        }else{
            $this->role = $rol_user[0];
        }

    }



}
