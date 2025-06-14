<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property Manufacturer $manufacturer
 */
class Aircraft extends Model
{
    use HasFactory;

//    protected $table = 'aircraft'; // Only if the table name is different from class name, don't do this normally
    protected $fillable = ['manufacturer_id', 'code', 'name', 'type'];

    public function getRouteKeyName()
    {
        return 'code';
    }

    // Relationships
    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
