<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('TableForm', function (Blueprint $table) {
            $table->id();
            $table->string('selected_seat'); // Set a specific default value
            $table->string('FROM_Municipality'); // Set a specific default value
            $table->string('TO_Municipality'); // Set a specific default value
            $table->string('Barangay'); // Use a general default value, as needed
            $table->string('Landmark'); 
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TableForm');
    }
};

