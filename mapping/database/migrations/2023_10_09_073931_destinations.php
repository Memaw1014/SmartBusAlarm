<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('FROM_Municipality');
            $table->string('TO_Municipality');
            $table->string('Barangay');
            $table->string('selected_seat');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('destinations');
    }

};
