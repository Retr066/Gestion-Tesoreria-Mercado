<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\ListReportes;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lote;
class ListReportesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ListReportes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lote_id' => function(){
                return Lote::factory()->create()->id;
            },

            'estado' => $this->faker->randomElement(['Generado']),
            'mes' => $this->faker->randomElement(['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Noviembre','Diciembre']),
            'ingreso_importe_total' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 5000),
            'egreso_importe_total' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 5000),
            'liquidez' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 5000),
        ];
    }
}
