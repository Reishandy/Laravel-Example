<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'stealth', 'supersonic', 'heavy', 'light', 'carrier-based', 'VTOL',
            'STOL', 'twin-engine', 'single-engine', 'delta-wing', 'swing-wing',
            'prototype', 'unmanned', 'export', 'legacy', 'modern', 'interceptor',
            'maritime', 'electronic-warfare', 'aerial-refueling', 'long-range',
            'short-range', 'all-weather', 'night-operations', 'trainer-advanced',
            'trainer-basic', 'experimental', 'multinational', 'naval', 'air-superiority'
        ];

        foreach ($tags as $tag) {
            Tag::updateOrCreate(['name' => $tag]);
        }
    }
}
