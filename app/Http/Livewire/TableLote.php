<?php

namespace App\Http\Livewire;
use App\Models\Lote;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\TableReportes;
use App\Models\ListReportes;
class TableLote extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $lotes_estado = '';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';



    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],
        'lotes_estado' => ['except'=> ''],
    ];

    protected $listeners = [
        'CrearAño' => 'render',
        'listLote' => 'render',
        'Detalles'
    ];

    public function render()
    {

        $lotes = Lote::whereIn('estado',['Proceso','Generado'])
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


        return view('livewire.table-lote',compact('lotes'));
    }

    public function Detalles($id){

        return redirect()->route('meses',$id);

    }

    public function clear(){
        $this->reset();
    }

    public function updatingSearch()
    {
        $this->resetPage();
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
