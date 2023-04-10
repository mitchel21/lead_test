<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    //pivot
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
