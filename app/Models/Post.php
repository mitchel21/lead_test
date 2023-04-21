<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'date_of_birth',
        'city_id',
        'text',
    ];

    //Relazione provincia
    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'city_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'city_id', 'id');
    }

}
