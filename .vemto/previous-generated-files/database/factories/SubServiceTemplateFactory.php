<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\SubServiceTemplate;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubServiceTemplateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubServiceTemplate::class;

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
            'url' => fake()->url(),
            'sub_service_id' => \App\Models\SubService::factory(),
        ];
    }
}
