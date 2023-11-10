<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentLocation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "currentLocation";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'latitude',
        'longitude',
    ];
}
