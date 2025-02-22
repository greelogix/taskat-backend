<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(1)
            ->create([
                'name'=>'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
            ]);

        // $this->call(ServiceSeeder::class);
        // $this->call(SubServiceSeeder::class);
    }
}
