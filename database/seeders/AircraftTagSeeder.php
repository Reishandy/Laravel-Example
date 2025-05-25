<?php

namespace Database\Seeders;

use App\Models\Aircraft;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AircraftTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tag mapping for real aircraft by type
        $typeTags = [
            'fighter' => ['air-superiority', 'supersonic', 'all-weather'],
            'multirole' => ['multinational', 'modern', 'all-weather'],
            'bomber' => ['long-range', 'heavy'],
            'cargo' => ['heavy', 'long-range'],
            'tanker' => ['aerial-refueling'],
            'trainer' => ['trainer-basic'],
            'attack' => ['ground-attack', 'all-weather'],
            'reconnaissance' => ['electronic-warfare', 'long-range'],
        ];

        // Get all tags
        $tags = Tag::pluck('id', 'name')->toArray();

        // Assign tags based on type
        $realAircraft = Aircraft::whereNotNull('code')->get();
        foreach ($realAircraft as $aircraft) {
            $tagsToAttach = [];
            $type = $aircraft->type;
            if (isset($typeTags[$type])) {
                foreach ($typeTags[$type] as $tagName) {
                    if (isset($tags[$tagName])) {
                        $tagsToAttach[] = $tags[$tagName];
                    }
                }
            }
            // Optionally add a random tag for variety
            $randomTagId = collect($tags)->random();
            if (!in_array($randomTagId, $tagsToAttach)) {
                $tagsToAttach[] = $randomTagId;
            }
            $aircraft->tags()->sync($tagsToAttach);
        }
    }
}
