<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres'=>$this->faker->name(),
            'apellidos'=>$this->faker->lastName(),
            'run'=>$this->faker->unique()->numerify('##########'),
            'fecha_nacimiento'=>$this->faker->date('Y-m-d','2025-01-01'),
            'genero'=>$this->faker->randomElement(['M','F']),
            'fono'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->unique()->safeEmail(),
            'direccion'=>$this->faker->address(),
            'estado_civil'=>$this->faker->randomElement(['Soltero/a','Casado/a','Viudo/a']),
            'observaciones'=>$this->faker->text(100),
        ];
    }
}
