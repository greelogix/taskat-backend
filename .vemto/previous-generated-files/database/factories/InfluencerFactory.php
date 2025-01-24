<?php

namespace Database\Factories;

use App\Models\Influencer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfluencerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Influencer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'bio' => fake()->sentence(15),
            'address' => fake()->address(),
            'lat' => fake()->word(),
            'long' => fake()->word(),
            'image' => fake()->word(),
        ];
    }
}
