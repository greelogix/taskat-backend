<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_date' => fake()->word(),
            'total_price' => fake()->randomFloat(2, 0, 9999),
            'text' => fake()->text(),
            'note' => fake()->word(),
            'own_domain' => fake()->word(),
            'domain_url' => fake()->word(),
            'payment_method' => fake()->word(),
            'payment_status' => fake()->word(),
            'user_id' => \App\Models\User::factory(),
            'service_id' => \App\Models\Service::factory(),
            'delivery_id' => \App\Models\DeliveryDays::factory(),
            'package_id' => \App\Models\SubService::factory(),
            'template_id' => \App\Models\SubServiceTemplate::factory(),
        ];
    }
}
