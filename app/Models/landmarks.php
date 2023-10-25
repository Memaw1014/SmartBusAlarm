<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landmarks extends Model
{
    use HasFactory;

    protected $table = "landmark";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TO_Municipality',
        'Barangay',
        'Landmark',
        'latitude',
        'longitude',
        'icon'
    ];
}
