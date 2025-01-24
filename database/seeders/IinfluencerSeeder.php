<?php

namespace Database\Seeders;

use App\Models\Iinfluencer;
use Illuminate\Database\Seeder;

class IinfluencerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Iinfluencer::factory()
            ->count(5)
            ->create();
    }
}
