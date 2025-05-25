<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
//    protected $table = 'aircraft'; // Only if the table name is different from class name
    protected $fillable = ['code', 'name', 'type'];
}
