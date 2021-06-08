<?php

namespace Database\Seeders;
use App\Models\ListReportes;
use App\Models\Ingresos;
use App\Models\Egresos;
use App\Models\TipoIngreso;
use App\Models\TipoEgreso;
use Illuminate\Database\Seeder;
use  App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' =>'Jherson',
            'lastname' =>'Lopez',
            'email' => 'jherson@gmail.com',
             'role' => 'admin',
            'password' => bcrypt('12345'),
        ]);
         \App\Models\User::factory(10)->create();

         $reporte = ListReportes::factory()->create([
            'usuario_id' =>  $user->id,
        ]);
        $reporte2 = ListReportes::factory()->create([
            'usuario_id' =>  $user->id,
        ]);
        ListReportes::factory()->count(80)->create();
        Ingresos::factory()->count(80)->create([
            'id_ingreso_reportes' =>  $reporte->id,
        ]);
        Egresos::factory()->count(80)->create([
            'id_egreso_reportes' =>  $reporte->id,
        ]);
        Ingresos::factory()->count(80)->create([
            'id_ingreso_reportes' =>  $reporte2->id,
        ]);
        Egresos::factory()->count(80)->create([
            'id_egreso_reportes' =>  $reporte2->id,
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Aportacion.Guard./InsCrip/Cuota Asamblea.'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Pago de Multas y Faenas.'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Cancelacion de Deudas.'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Aportacion Atrazadas Alquiler'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Aportacion Atrazadas Guard.'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Alumbrado Interno'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Alquiler'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Ambulante'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Consumo de Agua'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'SS.HH Limpieza Publica'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Pago por Autovaluo'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Aportacion por Actividad y Donaciones'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Nuevos Socios Ingresos Varios'
        ]);
        TipoIngreso::factory()->create([
            'Descripcion' => 'Ninguno'
        ]);
         ////////////////////////////////
         TipoEgreso::factory()->create([
            'Descripcion' => 'Directiva Pagos de Socios'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Fondo de Salud'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Tributo'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Honorarios Guardiania Baño Cobranza'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Servicios Publicos'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Articulos de Ferreteria'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Artic. de Aseo. y Protecc.Personal'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Articulos de Oficina'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Servic. de Impresion y Copias'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Gatos Notariable S/PAGO de Autoval'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Servicios Profesionales'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Gastos Varios'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Mant. Y Reparacion'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Ninguno'
        ]);
    }

}
