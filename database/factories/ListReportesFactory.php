<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\ListReportes;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'usuario_id' => function(){
                return User::factory()->create()->id;
            },
            'description' => $this->faker->sentence(),
            'estado' => $this->faker->randomElement(['Generado','Proceso','Terminado']),
            'mes' => $this->faker->randomElement(['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Noviembre','Diciembre']),
            'ingreso_importe_total' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 5000),
            'egreso_importe_total' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 5000),
            'liquidez' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 5000),
        ];
    }
}
