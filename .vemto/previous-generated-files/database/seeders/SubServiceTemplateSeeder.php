<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubServiceTemplate;

class SubServiceTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubServiceTemplate::factory()
            ->count(5)
            ->create();
    }
}
