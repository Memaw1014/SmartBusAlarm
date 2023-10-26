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
        Schema::create('from_municipality', function (Blueprint $table) {
            $table->id();
            $table->string('FROM_Municipality');
        });

        // Add a row to the from_barangay table
        DB::table('from_municipality')->insert([
            'FROM_Municipality' => 'Sogod',
        ]);
        DB::table('from_municipality')->insert([
            'FROM_Municipality' => 'Bontoc',
        ]);
        DB::table('from_municipality')->insert([
            'FROM_Municipality' => 'Tomas Oppus',
        ]);
        DB::table('from_municipality')->insert([
            'FROM_Municipality' => 'Malitbog',
        ]);
        DB::table('from_municipality')->insert([
            'FROM_Municipality' => 'Padre Burgos',
        ]);
        DB::table('from_municipality')->insert([
            'FROM_Municipality' => 'Macrohon',
        ]);
        DB::table('from_municipality')->insert([
            'FROM_Municipality' => 'Maasin',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('from_municipality');
    }
};