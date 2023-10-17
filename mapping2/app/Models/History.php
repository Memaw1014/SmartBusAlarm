<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history'; // Replace 'history' with the actual table name in your database

    protected $fillable = [
        'FROM_Municipality',
        'TO_Municipality',
        'Barangay',
        'Passenger_type',
        'Bus_fare',
        // Add other fields as needed
    ];
}
