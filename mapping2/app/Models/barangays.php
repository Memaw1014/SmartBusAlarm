<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangays extends Model
{
    use HasFactory;

    protected $table = "all_barangay";

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'Barangay','TO_Municipality'
    ];
}
