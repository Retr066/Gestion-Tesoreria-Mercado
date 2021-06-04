<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Ingresos;
use App\Models\ListReportes;
use Livewire\Component;
use Auth;

use Illuminate\Support\Facades\DB;
class TableIngresos extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $user_role = '';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';
    public $id_reporte ;

    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],
        'user_role'=> ['except'=> ''],
    ];

    protected $listeners = [
        'deleteIngresoList' => 'deleteIngreso',
        'reporteList' => 'render',
        'showIngresos' => 'render',
        'IngresosList' => 'render',

    ];


    public function render()
    {

        /* $id = ListReportes::where('id')->get(); */
       /*  $id_reportes = ListReportes::find(2)->r_ingresos; */

        /* $id_reportes = DB::table('ingresos')
                        ->leftJoin('list_reportes','list_reportes.id','=','ingresos.id_ingreso_reportes')

                        ->get(); */


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

        return view('livewire.table-ingresos',[
            'ingresos' => $ingresos,
        ])->layout('users.ingresos');
    }

    /* public function showIngresos($id_repor){
        $this->id_reporte_especifico = ListReportes::find($id_repor);

    } */
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

    public function deleteIngreso(Ingresos $ingreso){

        $ingreso->delete();
          $this->emit('deleteIngreso', $ingreso);
    }
    public function editIngreso(Ingresos $ingreso){



        $this->emit('editIngreso', $ingreso);
    }
}
