<?php

namespace App\Http\Livewire;
use Auth;
use App\Models\Egresos;
use App\Models\ListReportes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TableEgresos extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $id_reporte_egreso ;
    public $camp = null;
    public $order = null;
    public $icon = '-circle';
    public $can_submit = true;
    public $sum_importe;

    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],

    ];

    protected $listeners = [
        'deleteEgresoList'=> 'deleteEgreso',
        'updateEgreso' => 'render',
        'saveEgreso' => 'render',
        'ActiveButtonDelete',

    ];

    public function render(){
        $this->suma();
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

        return view('livewire.table-egresos',[
            'egresos'=> $egresos,
        ])->layout('users.egresos');;
    }


    public function mount(ListReportes $id){
        $this->id_reporte_egreso = $id;
        $this->id_reporte_egreso = $this->id_reporte_egreso['id'];
        $this->can_submit = true;
        $this->icon = $this->iconDirection($this->order);
        $this->suma();
    }
    public function suma(){
        $test = DB::table('egresos')->where('id_egreso_reportes', $this->id_reporte_egreso)->sum('egreso_importe');
        $this->sum_importe = $test;
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
    public function editEgreso(Egresos $egreso ){

        $this->DisableButtonDelete();
        $this->emit('editEgreso', $egreso);
    }

    public function deleteEgreso(Egresos $egreso){

          $egreso->delete();
         $this->emit('deleteEgreso', $egreso);
   }


    public function DisableButtonDelete(){
    if($this->can_submit == true){
        $this->can_submit = false;
    }
}
    public function ActiveButtonDelete(){
    if($this->can_submit == false){
    $this->can_submit = true;
    }
}

}
