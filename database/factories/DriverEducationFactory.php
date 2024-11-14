<?php

namespace Database\Factories;

use App\Models\DriverUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsDriverEducation>
 */
class DriverEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'driver_user_id' => DriverUser::latest()->first()->id,
            'lingua' => $this->faker->randomElement(['Inglês', 'Espanhol', 'Alemão', 'Italiano']),
            'fluencia' => $this->faker->randomElement(['Fluente', 'Intermediário', 'Básico', 'Nenhuma']),
        ];
    }
}
