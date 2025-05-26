<?php

namespace Database\Factories;

use App\Models\Aircraft;
use App\Models\Manufacturer;
use App\Models\TypePrefix;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aircraft>
 */
class AircraftFactory extends Factory
{
    protected static ?array $excludedCodes = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Custom generator
        // Get excluded codes only once
        if (is_null(static::$excludedCodes)) {
            static::$excludedCodes = Aircraft::pluck('code')->toArray();
        }

        $typePrefixes = TypePrefix::all();

        $type = $this->faker->randomElement(array_keys($typePrefixes));
        $prefix = $typePrefixes[$type];

        // Generate a unique code not in excluded codes
        do {
            $number = $this->faker->unique()->numberBetween(1, 99);
            $letter = $this->faker->optional(0.5)->randomElement(range('A', 'D'));
            $code = $prefix . str_pad($number, 2, '0', STR_PAD_LEFT) . $letter;
        } while (in_array($code, static::$excludedCodes));

        // Add to excluded to prevent future duplicates in this run
        static::$excludedCodes[] = $code;

        // Assign manufacturer from existing
        $manufacturerId = Manufacturer::inRandomOrder()->value('id');

        return [
//            'manufacturer_id' => Manufacturer::factory(), // For if you want the manufacturer to be created by this
            'manufacturer_id' => $manufacturerId,
            'code' => $code,
            'name' => ucfirst($this->faker->word()) . ($letter ? " $letter" : ''),
            'type' => $type,
        ];
    }
}
