<?php

namespace Database\Factories;
use App\Models\ListReportes;
use App\Models\Ingresos;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingresos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_ingreso_reportes'=>  function(){
                return ListReportes::factory()->create()->id;
            },
            'ingreso_fecha' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'ingreso_codigo' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'ingreso_descripcion' => $this->faker->sentence(),
            'tipo_importe' => $this->faker->randomElement(['Aportacion /Guard. /InsCrip /Cuota Asamblea.','Pago de Multas y Faenas.','Cancelacion de Deudas.','Aportacion Atrazadas Alquiler','Aportacion Atrazadas Guard.','Alumbrado Interno',
            'Alquiler','Ambulante','Consumo de Agua','SS.HH Limpieza Publica','Pago por Autovaluo','Aportacion por Actividad y Donaciones','Nuevos Socios Ingresos Varios','Ninguno']),
            'ingreso_importe' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 5000),
        ];
    }
}
