<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class from_municipalities extends Model
{
    use HasFactory;

    protected $table = "from_municipality";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FROM_Municipality',
        'Latitude',
        'Longitude',
    ];
}
