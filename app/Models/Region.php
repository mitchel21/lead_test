<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    //Relazione Regione a una sola provincia
    public function province()
    {
        return $this->hasMany(Province::class, 'region_id');
    }
    public function city()
    {
        return $this->hasManyThrough(
            City::class,
            Province::class,
            'region_id', // Nome della chiave esterna nella tabella "province"
            'province_id', // Nome della chiave esterna nella tabella "cities"
            'id', // Nome della chiave primaria nella tabella "regions"
        );
    }
}
