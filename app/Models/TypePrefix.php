<?php

namespace App\Models;

class TypePrefix
{
    public static function all(): array
    {
        return [
            'fighter' => 'F-',
            'attack' => 'A-',
            'multirole' => 'F/A-',
            'bomber' => 'B-',
            'cargo' => 'C-',
            'trainer' => 'T-',
            'tanker' => 'KC-',
            'reconnaissance' => 'R-',
        ];
    }
}
