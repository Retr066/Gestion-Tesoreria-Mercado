<?php

namespace Database\Factories;

use App\Models\Lote;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lote::class;

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
            'año'=> $this->faker->year($max = 'now'),
            'estado' => $this->faker->randomElement(['Generado']),
        ];
    }
}
