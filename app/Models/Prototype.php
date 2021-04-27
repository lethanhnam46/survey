<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prototype extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id','prototype'];

    public function properties()
    {
        return $this->belongsToMany(properties::class,'prototypes_properties', 'prototype_id','properties_id');
    }
}
