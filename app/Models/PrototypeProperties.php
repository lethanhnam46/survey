<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrototypeProperties extends Model
{
    use HasFactory;

    protected $fillable = ['prototype_id','properties_id'];

    public $table = "prototypes_properties";
}
