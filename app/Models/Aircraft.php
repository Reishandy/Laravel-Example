<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Aircraft
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'code' => 'F-16',
                'name' => 'Viper'
            ],
            [
                'id' => 2,
                'code' => 'F-22',
                'name' => 'Raptor'
            ],
            [
                'id' => 3,
                'code' => 'F-5',
                'name' => 'Tiger'
            ]
        ];
    }

    public static function find(string $id): ?array
    {
        return Arr::first(static::all(), fn($aircraft_details) => $aircraft_details['id'] == $id);
    }
}
