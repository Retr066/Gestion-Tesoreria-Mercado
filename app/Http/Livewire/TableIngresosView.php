<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Ingresos;
use App\Models\ListReportes;
use App\Models\Lote;
use Livewire\Component;
use Auth;
use Illuminate\Support\Facades\DB;


class TableIngresosView extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';

    public $camp = null;
    public $order = null;
    public $icon = '-circle';
    public $id_reporte ;
    public $lote_id;


    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],

    ];
    public function render()
    {
        $ingresos = Ingresos::where('id_ingreso_reportes', $this->id_reporte)
                            ->where(function ($query){
                                $query ->orWhere('id','LIKE','%'. $this->search.'%')
                                ->orWhere('ingreso_fecha','LIKE','%'. $this->search.'%')
                                ->orWhere('ingreso_codigo','LIKE','%'. $this->search.'%')
                                ->orWhere('ingreso_descripcion','LIKE','%'. $this->search.'%')
                                ->orWhere('tipo_importe','LIKE','%'. $this->search.'%')
                                ->orWhere('ingreso_importe','LIKE','%'. $this->search.'%');

                            });

                            if($this->camp && $this->order){
                                $ingresos = $ingresos->orderBy($this->camp,$this->order);
                              }else{
                                  $this->camp = null;
                                  $this->order = null;
                              }
                            $ingresos = $ingresos->paginate($this->perPage);
        return view('livewire.table-ingresos-view',compact('ingresos'))->layout('users.viewIngresos');
    }


    public function clear(){
        $this->search = '';
        $this->camp = null;
        $this->order = null;
        $this->perPage = 5;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function mount(ListReportes $id){
        $this->id_reporte = $id;
        $this->lote_id = $id->lote_id;
        $this->id_reporte = $this->id_reporte['id'];
        $this->icon = $this->iconDirection($this->order);

    }
    public function atras(){

        return redirect()->route('meses',$this->lote_id);
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
