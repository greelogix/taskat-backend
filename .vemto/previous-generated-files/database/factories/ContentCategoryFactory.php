<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ContentCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContentCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'decription' => fake()->word(),
        ];
    }
}
