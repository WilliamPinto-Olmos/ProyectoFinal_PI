<?php

namespace Database\Factories;

use App\Models\Provedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProvedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Provedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->paragraph(2),
            'telefono' => $this->faker->phoneNumber(),
            'direccion' => $this->faker->sentence(),
            'correo' => $this->faker->unique()->safeEmail()
        ];
    }
}
