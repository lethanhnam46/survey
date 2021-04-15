<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $fillable = ['properties','del_flag'];

    public function prototypes()
    {
        return $this->belongsToMany('Prototype','Rating');
    }
}
