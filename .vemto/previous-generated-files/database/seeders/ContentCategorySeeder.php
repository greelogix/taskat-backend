<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContentCategory;

class ContentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContentCategory::factory()
            ->count(5)
            ->create();
    }
}
