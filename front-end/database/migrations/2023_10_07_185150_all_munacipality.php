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
        Schema::create('all_municipality', function (Blueprint $table) {
            $table->id();
            $table->string('Municipality');
        });

        // Add a row to the all_barangay table
        DB::table('all_municipality')->insert([
            'Municipality' => 'Sogod',
        ]);
        DB::table('all_municipality')->insert([
            'Municipality' => 'Bontoc',
        ]);
        DB::table('all_municipality')->insert([
            'Municipality' => 'Tomas Oppus',
        ]);
        DB::table('all_municipality')->insert([
            'Municipality' => 'Malitbog',
        ]);
        DB::table('all_municipality')->insert([
            'Municipality' => 'Padre Burgos',
        ]);
        DB::table('all_municipality')->insert([
            'Municipality' => 'Macrohon',
        ]);
        DB::table('all_municipality')->insert([
            'Municipality' => 'Maasin',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('all_municipality');
    }
};