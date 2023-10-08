<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('all_barangay', function (Blueprint $table) {
            $table->id();
            $table->string('Barangay');
            $table->string('Municipality_ID');
            $table->timestamps();
        });

        $barangaySOGOD = [
            'Zone 2', 'San Jose', 'Tampoong'
        ];

        $barangaySOGOD = array_map(function ($barangay) {
            return [
                'Barangay' => $barangay,
                'Municipality_ID' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $barangaySOGOD);

        $barangayBONTOC = [
            'Casao', 'Talisay', 'Poblacion', 'Santo Niño', 'Divisoria', 'Union'
        ];

        $barangayBONTOC = array_map(function ($barangay) {
            return [
                'Barangay' => $barangay,
                'Municipality_ID' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $barangayBONTOC);

        $barangayTO = [
            'Higosoan', 'Tinago', 'Cambite', 'Iniguihan', 'San Agustin', 'Banday', 'Bogo', 'San Antonio', 'San Miguel', 'Maslog', 'San Roque', 
            'Looc', 'San Isidro', 'Canlupao'
        ];

        $barangayTO = array_map(function ($barangay) {
            return [
                'Barangay' => $barangay,
                'Municipality_ID' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $barangayTO);

        $barangayMALITBOG = [
            'Juangon', 'Maujo', 'Santa Cruz', 'Iba', 'Timba', 'Santo Niño', 'San Vicente', 'Sangahon', 'Abgao', 'Sabang', 'Cabul-anunan', 
            'San Antonio', 'Taliwa', 'Pasil', 'San Roque', 'San Jose', 'Caaga', 'Benit', 'Asuncion', 'Conception', 'Candatag', 'Cantamuac'
        ];

        $barangayMALITBOG = array_map(function ($barangay) {
            return [
                'Barangay' => $barangay,
                'Municipality_ID' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $barangayMALITBOG);

        $barangayPADREBURGOS = [
            'San Juan', 'Bunga', 'San Rosario', 'Dinahugan', 'Lungsodaan', 'Cantutang', 'Poblacion', 'Buenavista'
        ];

        $barangayPADREBURGOS = array_map(function ($barangay) {
            return [
                'Barangay' => $barangay,
                'Municipality_ID' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $barangayPADREBURGOS);

        $barangayMACROHON = [
            'San Roque', 'Asuncion', 'San Roque', 'Asuncion', 'Lower Villa Jacinta', 'Flodeliz', 'Buscayan', 'Canlusay', 
            'Aguinaldo', 'Molopolo', 'Santa Cruz', 'San Vicente', 'San Rosario', 'Rizal', 'Mohon', 'San Joaquin', 'Amparo', 'Ichon'
        ];

        $barangayMACROHON = array_map(function ($barangay) {
            return [
                'Barangay' => $barangay,
                'Municipality_ID' => '6',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $barangayMACROHON);

        $barangayMAASIN = [
            'Pasay', 'Ma. Clara', 'Ibarra', 'Isagani', 'Asuncion', 'Mambajao', 'Mantahan', 'Abgao', 'Tunga-tunga', 'Terminal'
        ];

        $barangayMAASIN = array_map(function ($barangay) {
            return [
                'Barangay' => $barangay,
                'Municipality_ID' => '7',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $barangayMAASIN);

        DB::table('all_barangay')->insert($barangaySOGOD);
        DB::table('all_barangay')->insert($barangayBONTOC);
        DB::table('all_barangay')->insert($barangayTO);
        DB::table('all_barangay')->insert($barangayMALITBOG);
        DB::table('all_barangay')->insert($barangayPADREBURGOS);
        DB::table('all_barangay')->insert($barangayMACROHON);
        DB::table('all_barangay')->insert($barangayMAASIN);
    
    }

    public function down()
    {
        Schema::dropIfExists('all_barangay');
    }
};