<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class to_municipalities extends Model
{
    use HasFactory;

    protected $table = "to_municipality";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TO_Municipality',
        'Latitude',
        'Longitude',
    ];
}
