<?php

namespace Database\Factories;

use App\Models\SubService;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubService::class;

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
            'image' => fake()->word(),
            'status' => fake()->word(),
            'price' => fake()->randomFloat(2, 0, 9999),
            'has_template' => fake()->word(),
            'service_id' => \App\Models\Service::factory(),
        ];
    }
}
