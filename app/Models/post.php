<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $guarded = [];


    
    // Accessor for the title
    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
    // Accessor for the description
    public function getDescriptionAttribute($value)
    {
        return strtoupper($value);
    }
 
}
