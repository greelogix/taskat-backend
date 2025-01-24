<?php

namespace Database\Factories;

use App\Models\Iinfluencer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class IinfluencerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Iinfluencer::class;

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
            'lat' => fake()->text(255),
            'long' => fake()->text(255),
            'image' => fake()->word(),
        ];
    }
}
