<?php

namespace App\Http\Livewire;
use App\Models\ListReportes;
use Livewire\Component;
use Livewire\WithPagination;
class TableReportes extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $reportes_estado = '';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';

    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],

    ];
    protected $listeners = [
        'deleteReporteList'=> 'destroyReporte',
    ];

    public function render()
    {

        $reportes = ListReportes::where('usuario_id',auth()->user()->id)
        ->where(function ($query){
            $query->orWhere('id','LIKE','%'. $this->search.'%')
            ->orWhere('description','LIKE','%'. $this->search.'%')
            ->orWhere('estado','LIKE','%'. $this->search.'%')
            ->orWhere('mes','LIKE','%'. $this->search.'%')
            ->orWhere('ingreso_importe_total','LIKE','%'. $this->search.'%')
            ->orWhere('egreso_importe_total','LIKE','%'. $this->search.'%')
            ->orWhere('liquidez','LIKE','%'. $this->search.'%');

        });

        if($this->camp && $this->order){
            $reportes = $reportes->orderBy($this->camp,$this->order);
          }else{
              $this->camp = null;
              $this->order = null;
          }
        $reportes = $reportes->paginate($this->perPage);

        return view('livewire.table-reportes',[
            'reportes'=> $reportes,
        ]);
    }

    public function destroyReporte(ListReportes $reporte){
        /*  User::find($id)->delete(); */

        $reporte->delete();
        $this->emit('destroyReporte',$reporte);
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
