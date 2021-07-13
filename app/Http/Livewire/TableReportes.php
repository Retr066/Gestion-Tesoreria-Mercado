<?php

namespace App\Http\Livewire;
use App\Models\ListReportes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Ingresos;
use App\Models\Egresos;
use App\Models\Lote;
use PDF;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
class TableReportes extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = '5';
    public $reportes_estado = '';
    public $camp = null;
    public $order = null;
    public $icon = '-circle';
    public $liquidez = '';
    public $id_lote ;


    protected $queryString = [
        'search'=> ['except'=> ''],
        'camp' => ['except'=>null],
        'order' => ['except'=>null],
        'perPage' => ['except'=> '5'],
        'reportes_estado' => ['except'=> ''],

    ];
    protected $listeners = [
        'deleteReporteList'=> 'destroyReporte',
        'guardaReporte' => 'render',
        'CrearReporte'=> 'render',
        'terminarReporteList' => 'terminarReporte',
        'listIngreso',
        'listEgreso',
    ];

    public function render()
    {


        $reportes = ListReportes::where('lote_id',$this->id_lote)
        ->whereIn('estado',['Proceso','Generado','Terminado'])
        ->where(function ($query){
            $query->orWhere('id','LIKE','%'. $this->search.'%')
            ->orWhere('estado','LIKE','%'. $this->search.'%')
            ->orWhere('mes','LIKE','%'. $this->search.'%')
            ->orWhere('ingreso_importe_total','LIKE','%'. $this->search.'%')
            ->orWhere('egreso_importe_total','LIKE','%'. $this->search.'%')
            ->orWhere('liquidez','LIKE','%'. $this->search.'%')->estado($this->reportes_estado);

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
        ])->layout('users.meses');
    }

    public function destroyReporte(ListReportes $reporte){


        $reporte->delete();
        $this->emit('destroyReporte',$reporte);
     }

     public function terminarReporte($reporte){
        $license = ListReportes::find($reporte);
        $id_reporte = $license->id;
        $estado = 'Terminado';
        $license->update([
                'id' => $id_reporte,
                'estado' => $estado,
        ]);
        $num_terminados = DB::table('list_reportes')
             ->where('lote_id',$this->id_lote)
             ->select(DB::raw('count(*) as num_terminados','estado'))
             ->where('estado','=','Terminado')
             ->groupBy('estado')
             ->get();

        if ($num_terminados[0]->num_terminados == 12) {
            $lote = Lote::find($this->id_lote);
            $lote->update([
                'id' => $lote->id,
                'estado' => 'Terminado',
            ]);
        }
        $this->emit('terminarReporte',$reporte);
     }

     public function listIngreso($id){

         return redirect()->route('ViewIngresos',$id);
     }

     public function listEgreso($id){
        return redirect()->route('ViewEgresos',$id);
     }
     public function clear(){
        $this->reset(['search','camp','order','perPage','reportes_estado']);

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount($id){
        $this->id_lote = $id;
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

    public function GenerarPdf($id){
        $reporte = ListReportes::find($id);
        $lote = Lote::find($reporte->lote_id);
        $date = $lote->año;
        $ingresos = Ingresos::where('id_ingreso_reportes', $id)->get();
        $ingresos = $ingresos->sortBy('ingreso_fecha');
        $pdf = PDF::loadView('users.pdf',compact('ingresos','reporte','date'));
          return  $pdf->stream('reporteIngreso.'.date('y-m-d').'.pdf');
    }

    public function GenerarPdfEgreso($id){
        $reporte = ListReportes::find($id);
        $lote = Lote::find($reporte->lote_id);
        $date = $lote->año;
        $egresos = Egresos::where('id_egreso_reportes', $id)->get();
        $egresos = $egresos->sortBy('egreso_fecha');
        $pdf = PDF::loadView('users.pdfEgreso',compact('egresos','reporte','date'));
          return  $pdf->stream('reporteEgreso.'.date('y-m-d').'.pdf');
    }

}
