<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypesOfDisease>
 */
class TypesOfDiseaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nameOfDisease' => $this->faker->word(),
            'shortDescription' => $this->faker->sentence(),
            'category' => $this->faker->word(),
        ];
    }
}
