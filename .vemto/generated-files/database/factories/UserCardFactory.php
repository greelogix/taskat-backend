<?php

namespace Database\Factories;

use App\Models\UserCard;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserCard::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'holder_name' => fake()->word(),
            'card_number' => fake()->word(),
            'valid_date' => fake()->word(),
            'default' => fake()->word(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
