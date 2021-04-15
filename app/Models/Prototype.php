<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prototype extends Model
{
    use HasFactory;

    protected $fillable = ['prototype','del_flag'];

    public function properties()
    {
        return $this->belongsToMany('Prototypes','Rating');
    }
}
