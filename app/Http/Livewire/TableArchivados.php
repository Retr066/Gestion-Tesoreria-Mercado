<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\ListReportes;
use App\Models\Lote;
class TableArchivados extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $lotes_estado = '';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';

    protected $listeners = [

        'Detalles'
    ];

    public function render()
    {

        $lotes = Lote::where('estado','Terminado')
        ->where(function ($query){
            $query->orWhere('id','LIKE','%'. $this->search.'%')
            ->orWhere('año','LIKE','%'. $this->search.'%')
            ->orWhere('estado','LIKE','%'. $this->search.'%')->estado($this->lotes_estado);

        });

        if($this->camp && $this->order){
            $lotes = $lotes->orderBy($this->camp,$this->order);
          }else{
              $this->camp = null;
              $this->order = null;
          }
        $lotes = $lotes->paginate($this->perPage);

        return view('livewire.table-archivados',compact('lotes'));
    }
    public function clear(){
        $this->reset();
    }

    public function Detalles($id){

        return redirect()->route('meses',$id);

    }
    public function mount(){
        $this->icon = $this->iconDirection($this->order);
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



}
