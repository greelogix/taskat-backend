<?php

namespace Database\Seeders;

use App\Models\UserCard;
use Illuminate\Database\Seeder;

class UserCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCard::factory()
            ->count(5)
            ->create();
    }
}
