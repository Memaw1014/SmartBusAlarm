<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';

    protected $fillable = [
        'FROM_Municipality',
        'TO_Municipality',
        'Barangay',
        'Passenger_type',
        'Bus_fare',
    ];
}
