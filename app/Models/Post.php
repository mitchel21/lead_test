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
        'province_id',
        'city_id',
        'text',
    ];

    //Relazione provincia
    public static function create(array $array)
    {
    }

    public function province()
    {
        return $this->hasOne('App\Models\Province', 'id', 'province_id');
    }
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }
}
