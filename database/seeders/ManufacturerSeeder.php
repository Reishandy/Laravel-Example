<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use App\Models\User;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Special for Lockheed Martin
        Manufacturer::updateOrCreate(
            ['name' => 'Lockheed Martin'],
            ['name' => 'Lockheed Martin', 'country' => 'United States', 'user_id' => 1]
        );

        // Real aircraft manufacturer
        $manufacturers = [
            ['name' => 'Boeing', 'country' => 'United States'],
            ['name' => 'Northrop Grumman', 'country' => 'United States'],
            ['name' => 'McDonnell Douglas', 'country' => 'United States'],
            ['name' => 'General Dynamics', 'country' => 'United States'],
            ['name' => 'Sukhoi', 'country' => 'Russia'],
            ['name' => 'Mikoyan', 'country' => 'Russia'],
            ['name' => 'Yakovlev', 'country' => 'Russia'],
            ['name' => 'Eurofighter GmbH', 'country' => 'Europe'],
            ['name' => 'Airbus', 'country' => 'Europe'],
            ['name' => 'Saab', 'country' => 'Sweden'],
            ['name' => 'Dassault Aviation', 'country' => 'France'],
            ['name' => 'Chengdu Aircraft Corporation', 'country' => 'China'],
            ['name' => 'Tupolev', 'country' => 'Russia'],
            ['name' => 'Antonov', 'country' => 'Ukraine'],
            ['name' => 'Ilyushin', 'country' => 'Russia'],
            ['name' => 'Alenia Aermacchi', 'country' => 'Italy'],
            ['name' => 'BAE Systems', 'country' => 'United Kingdom'],
            ['name' => 'Fairchild Republic', 'country' => 'United States'],
            ['name' => 'Harbin Aircraft Industry Group', 'country' => 'China']
        ];

        foreach ($manufacturers as $manufacturer) {
            Manufacturer::updateOrCreate(
                ['name' => $manufacturer['name']],
                array_merge($manufacturer, ['user_id' => User::factory()->create()->id])
            );
        }

        // Also create some new fictional ones
        Manufacturer::factory(5)->create();
    }
}
