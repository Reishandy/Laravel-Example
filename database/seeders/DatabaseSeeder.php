<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User for Lockheed Martin
        User::create([
            'name' => 'Rei Makoto',
            'email' => 'rei@example.com',
            'password' => '12345678'
        ]);

        $this->call(ManufacturerSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(AircraftSeeder::class);
        $this->call(AircraftTagSeeder::class);
    }
}
