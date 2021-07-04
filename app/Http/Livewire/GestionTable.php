<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
class GestionTable extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $user_role = '';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';
    public $showModal = 'hidden';
    public $roles = [];

    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],
        'user_role'=> ['except'=> ''],
    ];
    protected $listeners = [
        'userListUpdate' => 'render',
        'destroyList'=> 'destroy',
    ];

    public function render()
    {
        $users = User::termino($this->search)
        ->when($this->user_role != '',function($query){
            return $query->role($this->user_role);
       });

        if($this->camp && $this->order){
            $users = $users->orderBy($this->camp,$this->order);
          }else{
              $this->camp = null;
              $this->order = null;
          }
        $users = $users->paginate($this->perPage);

        return view('livewire.gestion-table',compact('users'));
    }

    public function clear(){
        $this->reset();
    }
    public function destroy(User $user){
       /*  User::find($id)->delete(); */

       $user->delete();
       $this->emit('destroy',$user);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount(){
        $this->icon = $this->iconDirection($this->order);
        $this->roles = Role::pluck('name','name')->toArray();
    }
    public function hydrate(){
        $this->roles = Role::pluck('name','name')->toArray();
    }

    public function sortable($camp)
    {
        if($camp !== $this->camp){
            $this->order = null;
        }
        switch ($this->order) {
            case null:
                $this->order = 'asc';

                break;
            case 'asc':
                $this->order = 'desc';

                break;
            case 'desc':
                $this->order = null;

                break;
        }
        $this->icon =$this->iconDirection($this->order);
        $this->camp = $camp;
    }

    public function iconDirection($sort):string
    {
        if(!$sort){
            return '-circle';
        }
        return $sort === 'asc' ? '-arrow-circle-up' : '-arrow-circle-down';
    }

    public function showModal(User $user){
        if($user->name){
          $this->emit('showModal',$user);
        } else {
            $this->emit('showModalNewUser');
        }
    }

    public function showImage(User $user){
        if($user->name){
          $this->emit('showImage',$user);
        } else {
           return;
        }
    }

}
