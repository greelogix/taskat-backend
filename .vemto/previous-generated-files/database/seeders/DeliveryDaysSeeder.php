<?php

namespace Database\Seeders;

use App\Models\DeliveryDays;
use Illuminate\Database\Seeder;

class DeliveryDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryDays::factory()
            ->count(5)
            ->create();
    }
}
