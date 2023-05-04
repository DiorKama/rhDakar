<?php

namespace Database\Factories;

use App\Models\AppointmentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppointmentType>
 */
class AppointmentTypeFactory extends Factory
{
    protected $model = AppointmentType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'active' => $this->faker->boolean(90), // 90% chance of being true
        ];
    }
}
