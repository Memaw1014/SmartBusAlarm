<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableForm extends Model
{
    use HasFactory;
    protected $table = 'TableForm';

    protected $fillable = [
        'selected_seat',
        'FROM_Municipality',
        'TO_Municipality',
        'Barangay',
        'created_at',
        'updated_at'
        
    ];

}
