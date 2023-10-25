<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('to_municipality', function (Blueprint $table) {
            $table->id();
            $table->string('TO_Municipality');
        });

        // Add a row to the to_barangay table
        DB::table('to_municipality')->insert([
            'TO_Municipality' => 'Sogod',
        ]);
        DB::table('to_municipality')->insert([
            'TO_Municipality' => 'Bontoc',
        ]);
        DB::table('to_municipality')->insert([
            'TO_Municipality' => 'Tomas Oppus',
        ]);
        DB::table('to_municipality')->insert([
            'TO_Municipality' => 'Malitbog',
        ]);
        DB::table('to_municipality')->insert([
            'TO_Municipality' => 'Padre Burgos',
        ]);
        DB::table('to_municipality')->insert([
            'TO_Municipality' => 'Macrohon',
        ]);
        DB::table('to_municipality')->insert([
            'TO_Municipality' => 'Maasin',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('to_municipality');
    }
};