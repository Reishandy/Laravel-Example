<?php

namespace Database\Seeders;

use App\Models\Aircraft;
use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AircraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Map aircraft code to manufacturer name (matching ManufacturerSeeder)
        $manufacturerMap = [
            'F-16' => 'General Dynamics',
            'F-22' => 'Lockheed Martin',
            'F-5' => 'Northrop Grumman',
            'F-14A' => 'McDonnell Douglas',
            'F-14B' => 'McDonnell Douglas',
            'F-15C' => 'McDonnell Douglas',
            'F-15E' => 'McDonnell Douglas',
            'F/A-18C' => 'McDonnell Douglas',
            'F/A-18E' => 'Boeing',
            'F-35A' => 'Lockheed Martin',
            'F-35B' => 'Lockheed Martin',
            'F-35C' => 'Lockheed Martin',
            'Su-27' => 'Sukhoi',
            'Su-35' => 'Sukhoi',
            'MiG-29' => 'Mikoyan',
            'Typhoon' => 'Eurofighter GmbH',
            'Gripen C' => 'Saab',
            'Rafale B' => 'Dassault Aviation',
            'J-10C' => 'Chengdu Aircraft Corporation',
            'J-20' => 'Chengdu Aircraft Corporation',
            'B-1B' => 'Boeing',
            'B-2A' => 'Northrop Grumman',
            'B-52H' => 'Boeing',
            'Tu-95' => 'Tupolev',
            'Tu-160' => 'Tupolev',
            'C-130J' => 'Lockheed Martin',
            'C-17' => 'Boeing',
            'C-5M' => 'Lockheed Martin',
            'A400M' => 'Airbus',
            'An-124' => 'Antonov',
            'KC-135' => 'Boeing',
            'KC-10' => 'McDonnell Douglas',
            'KC-46A' => 'Boeing',
            'Il-78' => 'Ilyushin',
            'T-38' => 'Northrop Grumman',
            'T-7A' => 'Boeing',
            'Hawk T1' => 'BAE Systems',
            'Yak-130' => 'Yakovlev',
            'M-346' => 'Alenia Aermacchi',
            'A-10C' => 'Fairchild Republic',
            'AV-8B' => 'McDonnell Douglas',
            'Su-25' => 'Sukhoi',
            'Mirage 2000D' => 'Dassault Aviation',
            'JH-7A' => 'Harbin Aircraft Industry Group',
            'RQ-4' => 'Northrop Grumman',
            'U-2S' => 'Lockheed Martin',
            'SR-71' => 'Lockheed Martin',
            'E-3' => 'Boeing',
            'P-8A' => 'Boeing',
        ];

        // Get manufacturer IDs by name
        $manufacturerIds = Manufacturer::pluck('id', 'name')->toArray();

        // Real aircraft data
        $aircrafts = [
            ['code' => 'F-16', 'name' => 'Fighting Falcon', 'type' => 'fighter'],
            ['code' => 'F-22', 'name' => 'Raptor', 'type' => 'fighter'],
            ['code' => 'F-5', 'name' => 'Tiger', 'type' => 'fighter'],
            ['code' => 'F-14A', 'name' => 'Tomcat A', 'type' => 'fighter'],
            ['code' => 'F-14B', 'name' => 'Tomcat B', 'type' => 'fighter'],
            ['code' => 'F-15C', 'name' => 'Eagle C', 'type' => 'fighter'],
            ['code' => 'F-15E', 'name' => 'Strike Eagle', 'type' => 'fighter'],
            ['code' => 'F/A-18C', 'name' => 'Hornet C', 'type' => 'fighter'],
            ['code' => 'F/A-18E', 'name' => 'Super Hornet E', 'type' => 'fighter'],
            ['code' => 'F-35A', 'name' => 'Lightning II A', 'type' => 'multirole'],
            ['code' => 'F-35B', 'name' => 'Lightning II B', 'type' => 'multirole'],
            ['code' => 'F-35C', 'name' => 'Lightning II C', 'type' => 'multirole'],
            ['code' => 'Su-27', 'name' => 'Flanker B', 'type' => 'fighter'],
            ['code' => 'Su-35', 'name' => 'Flanker E', 'type' => 'fighter'],
            ['code' => 'MiG-29', 'name' => 'Fulcrum', 'type' => 'fighter'],
            ['code' => 'Typhoon', 'name' => 'Eurofighter', 'type' => 'multirole'],
            ['code' => 'Gripen C', 'name' => 'Saab Gripen C', 'type' => 'multirole'],
            ['code' => 'Rafale B', 'name' => 'Dassault Rafale B', 'type' => 'multirole'],
            ['code' => 'J-10C', 'name' => 'Vigorous Dragon', 'type' => 'fighter'],
            ['code' => 'J-20', 'name' => 'Mighty Dragon', 'type' => 'fighter'],
            ['code' => 'B-1B', 'name' => 'Lancer', 'type' => 'bomber'],
            ['code' => 'B-2A', 'name' => 'Spirit', 'type' => 'bomber'],
            ['code' => 'B-52H', 'name' => 'Stratofortress', 'type' => 'bomber'],
            ['code' => 'Tu-95', 'name' => 'Bear', 'type' => 'bomber'],
            ['code' => 'Tu-160', 'name' => 'Blackjack', 'type' => 'bomber'],
            ['code' => 'C-130J', 'name' => 'Super Hercules', 'type' => 'cargo'],
            ['code' => 'C-17', 'name' => 'Globemaster III', 'type' => 'cargo'],
            ['code' => 'C-5M', 'name' => 'Galaxy', 'type' => 'cargo'],
            ['code' => 'A400M', 'name' => 'Atlas', 'type' => 'cargo'],
            ['code' => 'An-124', 'name' => 'Ruslan', 'type' => 'cargo'],
            ['code' => 'KC-135', 'name' => 'Stratotanker', 'type' => 'tanker'],
            ['code' => 'KC-10', 'name' => 'Extender', 'type' => 'tanker'],
            ['code' => 'KC-46A', 'name' => 'Pegasus', 'type' => 'tanker'],
            ['code' => 'Il-78', 'name' => 'Midas', 'type' => 'tanker'],
            ['code' => 'T-38', 'name' => 'Talon', 'type' => 'trainer'],
            ['code' => 'T-7A', 'name' => 'Red Hawk', 'type' => 'trainer'],
            ['code' => 'Hawk T1', 'name' => 'BAE Hawk', 'type' => 'trainer'],
            ['code' => 'Yak-130', 'name' => 'Mitten', 'type' => 'trainer'],
            ['code' => 'M-346', 'name' => 'Master', 'type' => 'trainer'],
            ['code' => 'A-10C', 'name' => 'Warthog', 'type' => 'attack'],
            ['code' => 'AV-8B', 'name' => 'Harrier II', 'type' => 'attack'],
            ['code' => 'Su-25', 'name' => 'Frogfoot', 'type' => 'attack'],
            ['code' => 'Mirage 2000D', 'name' => 'Mirage D', 'type' => 'attack'],
            ['code' => 'JH-7A', 'name' => 'Flying Leopard', 'type' => 'attack'],
            ['code' => 'RQ-4', 'name' => 'Global Hawk', 'type' => 'reconnaissance'],
            ['code' => 'U-2S', 'name' => 'Dragon Lady', 'type' => 'reconnaissance'],
            ['code' => 'SR-71', 'name' => 'Blackbird', 'type' => 'reconnaissance'],
            ['code' => 'E-3', 'name' => 'Sentry AWACS', 'type' => 'reconnaissance'],
            ['code' => 'P-8A', 'name' => 'Poseidon', 'type' => 'reconnaissance'],
        ];

        // Dynamically assign the manufacturer id
        foreach ($aircrafts as $aircraft) {
            $manufacturerName = $manufacturerMap[$aircraft['code']] ?? null;
            $aircraft['manufacturer_id'] = $manufacturerIds[$manufacturerName] ?? null;
            Aircraft::updateOrCreate(
                ['code' => $aircraft['code']],
                $aircraft
            );
        }

        // Also create some new fictional ones
        Aircraft::factory(50)->create();
    }
}
