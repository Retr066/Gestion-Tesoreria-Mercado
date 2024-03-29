<?php

namespace Database\Factories;
use App\Models\ListReportes;
use App\Models\Egresos;
use Illuminate\Database\Eloquent\Factories\Factory;

class EgresosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Egresos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_egreso_reportes'=>  function(){
                return ListReportes::factory()->create()->id;
            },
            'egreso_fecha' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'egreso_codigo' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'egreso_descripcion' => $this->faker->sentence(),
            'tipo_importe_egreso' => $this->faker->randomElement(['Directiva Pagos de Socios','Fondo de Salud','Tributo','Honorarios Guardiania Baño Cobranza','Servicios Publicos',
            'Articulos de Ferreteria','Articulos de Aseo y Proteccion Personal','Articulos de Oficina','Servic. de Impresion y Copias','Gatos Notariable S/pago de Autovalu',
            'Servicios Profesionales','Gastos Varios','Mant. Y Reparacion','Ninguno']),
            'egreso_importe' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 5000),
        ];
    }
}
