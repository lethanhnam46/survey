<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    
    protected $guarded = [''];
    
    public function prototypes()
    {
        return $this->hasMany(prototype::class);
    }
    
    public function ratings()
    {
        return $this->hasMany(rating::class);
    }
}
