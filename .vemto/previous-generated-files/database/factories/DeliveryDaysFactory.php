<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\DeliveryDays;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryDaysFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryDays::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->sentence(15),
            'price' => fake()->randomFloat(2, 0, 9999),
            'status' => fake()->word(),
            'sub_service_id' => \App\Models\SubService::factory(),
        ];
    }
}
