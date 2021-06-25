<?php

namespace App\Http\Livewire;
use Auth;
use App\Models\Egresos;
use App\Models\ListReportes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TableEgresosView extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $id_reporte_egreso ;
    public $camp = null;
    public $order = null;
    public $icon = '-circle';
    public $lote_id ;

    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],

    ];

    public function render()
    {
        $egresos = Egresos::where('id_egreso_reportes', $this->id_reporte_egreso)
        ->where(function ($query){
            $query ->orWhere('id','LIKE','%'. $this->search.'%')
            ->orWhere('egreso_fecha','LIKE','%'. $this->search.'%')
            ->orWhere('egreso_codigo','LIKE','%'. $this->search.'%')
            ->orWhere('egreso_descripcion','LIKE','%'. $this->search.'%')
            ->orWhere('tipo_importe_egreso','LIKE','%'. $this->search.'%')
            ->orWhere('egreso_importe','LIKE','%'. $this->search.'%');

        });

        if($this->camp && $this->order){
            $egresos = $egresos->orderBy($this->camp,$this->order);
          }else{
              $this->camp = null;
              $this->order = null;
          }
        $egresos = $egresos->paginate($this->perPage);

        return view('livewire.table-egresos-view',compact('egresos'))->layout('users.viewEgresos');
    }
    public function mount(ListReportes $id){
        $this->id_reporte_egreso = $id;
        $this->lote_id = $id->lote_id;
        $this->id_reporte_egreso = $this->id_reporte_egreso['id'];
        $this->icon = $this->iconDirection($this->order);

    }

    public function clear(){
        $this->search = '';
        $this->camp = null;
        $this->order = null;
        $this->perPage = 5;
    }
    public function atras(){

        return redirect()->route('meses',$this->lote_id);
    }


    public function updatingSearch()
    {
        $this->resetPage();
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
