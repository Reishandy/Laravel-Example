<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property User $user
 */
class Manufacturer extends Model
{
    /** @use HasFactory<\Database\Factories\ManufacturerFactory> */
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function aircrafts(): HasMany
    {
        return $this->hasMany(Aircraft::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
