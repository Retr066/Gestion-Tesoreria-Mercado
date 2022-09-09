<?php

namespace Database\Seeders;
use App\Models\ListReportes;
use App\Models\Ingresos;
use App\Models\Egresos;
use App\Models\TipoIngreso;
use App\Models\TipoEgreso;
use Illuminate\Database\Seeder;
use  App\Models\User;
use App\Models\Lote;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
            'email' => 'jherson.lopez88@gmail.com',

            'password' => bcrypt('12345'),
        ]);
        $user2 = User::create([
            'name' =>'test',
            'lastname' =>'test',
            'email' => 'admin666@yopmail.com',

            'password' => bcrypt('12345678'),
        ]);
        /*  \App\Models\User::factory(10)->create(); */


        $role = Role::create(['name' => 'Jefe']);
        $role2 = Role::create(['name' => 'Trabajador']);

        Permission::create(['name' => 'trabajador.ver'])->syncRoles([$role,$role2]);
        Permission::create(['name' => 'trabajador.crear'])->syncRoles([$role,$role2]);
        Permission::create(['name' => 'trabajador.actulizar'])->syncRoles([$role,$role2]);
        Permission::create(['name' => 'trabajador.eliminar'])->syncRoles([$role,$role2]);

        Permission::create(['name' => 'jefe.ver'])->syncRoles($role2);
        Permission::create(['name' => 'jefe.crear'])->syncRoles($role2);
        Permission::create(['name' => 'jefe.actulizar'])->syncRoles($role2);
        Permission::create(['name' => 'jefe.eliminar'])->syncRoles($role2);

        $user->assignRole('Jefe');
        $user2->assignRole('Trabajador');
         $lote = Lote::factory()->create([
            'usuario_id' =>  $user->id,
            'año' => 2021,
        ]);

         $reporte = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Enero'
        ]);
        $reporte2 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Febrero'
        ]);
        $reporte3 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Marzo'
        ]);
        $reporte4 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Abril'
        ]);
        $reporte5 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Mayo'
        ]);
        $reporte6 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Junio'
        ]);
        $reporte7 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Julio'
        ]);
        $reporte8 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Agosto'
        ]);
        $reporte9 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Setiembre'
        ]);
        $reporte10 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Octubre'
        ]);
        $reporte11 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Noviembre'
        ]);
        $reporte12 = ListReportes::factory()->create([
            'lote_id' =>  $user->id,
            'mes' => 'Diciembre'
        ]);


        Ingresos::factory()->count(20)->create([
            'id_ingreso_reportes' =>  $reporte->id,
        ]);
        Egresos::factory()->count(20)->create([
            'id_egreso_reportes' =>  $reporte->id,
        ]);
        Ingresos::factory()->count(20)->create([
            'id_ingreso_reportes' =>  $reporte2->id,
        ]);
        Egresos::factory()->count(20)->create([
            'id_egreso_reportes' =>  $reporte2->id,
        ]);
        Ingresos::factory()->count(20)->create([
            'id_ingreso_reportes' =>  $reporte3->id,
        ]);
        Egresos::factory()->count(20)->create([
            'id_egreso_reportes' =>  $reporte3->id,
        ]);
        Ingresos::factory()->count(20)->create([
            'id_ingreso_reportes' =>  $reporte4->id,
        ]);
        Egresos::factory()->count(20)->create([
            'id_egreso_reportes' =>  $reporte4->id,
        ]);
        Ingresos::factory()->count(20)->create([
            'id_ingreso_reportes' =>  $reporte5->id,
        ]);
        Egresos::factory()->count(20)->create([
            'id_egreso_reportes' =>  $reporte5->id,
        ]);
        Ingresos::factory()->count(20)->create([
            'id_ingreso_reportes' =>  $reporte6->id,
        ]);
        Egresos::factory()->count(20)->create([
            'id_egreso_reportes' =>  $reporte6->id,
        ]);
      /*   Ingresos::factory()->count(80)->create([
            'id_ingreso_reportes' =>  $reporte7->id,
        ]);
        Egresos::factory()->count(80)->create([
            'id_egreso_reportes' =>  $reporte7->id,
        ]);
        Ingresos::factory()->count(80)->create([
            'id_ingreso_reportes' =>  $reporte8->id,
        ]);
        Egresos::factory()->count(80)->create([
            'id_egreso_reportes' =>  $reporte8->id,
        ]);
        Ingresos::factory()->count(80)->create([
            'id_ingreso_reportes' =>  $reporte9->id,
        ]);
        Egresos::factory()->count(80)->create([
            'id_egreso_reportes' =>  $reporte9->id,
        ]);
        Ingresos::factory()->count(80)->create([
            'id_ingreso_reportes' =>  $reporte10->id,
        ]);
        Egresos::factory()->count(80)->create([
            'id_egreso_reportes' =>  $reporte10->id,
        ]);
        Ingresos::factory()->count(80)->create([
            'id_ingreso_reportes' =>  $reporte11->id,
        ]);
        Egresos::factory()->count(80)->create([
            'id_egreso_reportes' =>  $reporte11->id,
        ]);
        Ingresos::factory()->count(80)->create([
            'id_ingreso_reportes' =>  $reporte12->id,
        ]);
        Egresos::factory()->count(80)->create([
            'id_egreso_reportes' =>  $reporte12->id,
        ]); */







        /////////////
        TipoIngreso::factory()->create([
            'Descripcion' => 'Aportacion /Guard. /InsCrip /Cuota Asamblea.'
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
            'Descripcion' => 'Articulos de Aseo y Proteccion Personal'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Articulos de Oficina'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Servic. de Impresion y Copias'
        ]);
        TipoEgreso::factory()->create([
            'Descripcion' => 'Gatos Notariable S/pago de Autovalu'
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
