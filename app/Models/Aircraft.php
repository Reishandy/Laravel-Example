<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aircraft extends Model
{
    use HasFactory;

//    protected $table = 'aircraft'; // Only if the table name is different from class name
    protected $fillable = ['code', 'name', 'type'];

    // Relationship with manufacturer
    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Manufacturer::class);
    }
}
