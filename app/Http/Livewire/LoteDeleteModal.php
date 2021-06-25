<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use App\Models\Lote;
class LoteDeleteModal extends Component
{


    public $open = false;
    public $tituloModal = '';
    public $action = '';
    public $tituloBoton = '';
    public $id_año ;
    public $password = '';
    public $user_password = '';
    protected $listeners = [
        'deleteModal' => 'abrirModal',
        'password'
    ];

    public function render()
    {
        return view('livewire.lote-delete-modal');
    }

    public function abrirModal($id_año)
    {
        $this->tituloModal = 'Eliminar Año';
        $this->open = true;
        $this->action = 'EliminarAño';
        $this->tituloBoton = 'Eliminar';
        $this->id_año = $id_año;

    }


    public function cerrarModal(){
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }


    public function EliminarAño(){

        $validatedData = $this->validate([
            'password' => 'required|string',
        ]);


        if (Hash::check($validatedData['password'], auth()->user()->password)) {
            $this->eliminar();
            $this->emitTo('table-lote','listLote');

        }else{
            $this->addError('password','Las credenciales proporcionadas no coinciden con nuestros registros.');

        }



    }

    public function eliminar(){
        $reporte = Lote::find($this->id_año);
        $reporte->delete();
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('destroyAño',$reporte);
    }
}
