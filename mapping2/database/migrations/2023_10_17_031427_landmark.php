<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('landmark', function (Blueprint $table) {
            $table->id();
            $table->string('TO_Municipality');
            $table->string('Barangay');
            $table->string('Landmark');
            $table->timestamps();
        });

        $landmarkZone3 = [
            'Terminal', 
        ];

        $landmarkZone3 = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Sogod',
                'Barangay' => 'Zone 3'
                
            ];
        }, $landmarkZone3);

        $landmarkZone2 = [
            'Palawan', 'Devine Rays',
        ];

        $landmarkZone2 = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Sogod',
                'Barangay' => 'Zone 2'
            ];
        }, $landmarkZone2);

        $landmarkSanJose = [
            'Cafe Romara & Shell Gas Station', 'Syshore'
        ];

        $landmarkSanJose = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Sogod',
                'Barangay' => 'San Jose',
            ];
        }, $landmarkSanJose);

        $landmarkTampoong = [
            'C-Oil', 'ADZ Funeral Services', 'Sogod Public Cemetery', 'Tampoong Gymnasium', 'Tampoong Brgy. Road'
        ];

        $landmarkTampoong = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Sogod',
                'Barangay' => 'Tampoong',
            ];
        }, $landmarkTampoong);

        $landmarkStaCruz = [
            'Malansa Bridge', 'Sta Cruz Elementary School', 'ELCANA Water Refilling Station', 'Sta Cruz Brgy Road(next ELCANA Water Refilling Station)', 'Sta Cruz Brgy Road (Near Sta Cruz Church)', 'Sta Cruz Church', 'Grace Joy Integrated Farm', 'Dodong Amora Funeral Homes', 'SLSU Multi Species Hatchery near Casao Brgy Road', 'St. Peter Chapels', 'Casao Brgy Hall', 
            'Casao Brgy Road/Arline Store', 'Casao Gymnasium', 'XP Huloglang', 'EJJE Internet Cafe and Ticketing Office'
        ];
        
        $landmarkStaCruz = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Sta. Cruz',
            ];
        }, $landmarkStaCruz);

        $landmarkCasao = [
            'SLSU Multi Species Hatchery near Casao Brgy Road', 'St. Peter Chapels', 'Casao Brgy Hall', 'Casao Brgy Road/Arline Store', 'Casao Gymnasium', 'XP Huloglang', 'EJJE Internet Cafe and Ticketing Office'
        ];
        
        $landmarkCasao = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Casao',
            ];
        }, $landmarkCasao);

        $landmarkTalisay = [
            'Talisay Welcome', 'Near Diverse Minds Montessori School, Inc.', 'Los Marineros(Resort and Fastfood)', 'Benies Store', 'Making bamboo chair/furniture ', 'Near to Bontoc-Libas Provicial Road', 'JADEMAR Coco Lumber and Construction Supply', 'Near PENRO/CENRO Provincial Nursery- Bontoc ENR Station', 'Olayvars Place', 'Talisay Brgy Road ', 'Saint Isidore the Laborer Chapel', 'Talisay Brgy Hall'
        ];

        $landmarkTalisay = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Talisay',
            ];
        }, $landmarkTalisay);

        $landmarkPoblacion = [
            'Bontoc Poblacion Public Market', 'Bontoc Terminal', 'Aqua ABS', 'Bontoc Gymnasium', 'Sto Nino Parish', 'ASA Philippines Foundation'
        ];

        $landmarkPoblacion = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Poblacion'
            ];
        }, $landmarkPoblacion);

        $landmarkSantoNiño = [
            'Prycegas ', 'Assembly of God', 'A-Power Gas Station', 'Emirates Gas Station/Bontoc Livelihood', 'Holy Child Chapel', 'Christian and Missionarry alliance church', 'Sto.Nino Basketballcourt & Pathway to Sto.Nino Cementery ', 'Limars Store', 'Bontoc Municipal Police Station', 'Road to Holy Cross Gardens and Yumeya Mountain Resort'
        ];

        $landmarkStoNino = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Santo Niño'
            ];
        }, $landmarkSantoNiño);

        $landmarkDivisoria = [
            'Divisoria Bridge ', 'Divisoria Brgy Public Market', 'M & A mini RTW and Marians Hardware ', 'Fia Sizzling House', 'Divisoria Elementary School', 'Bonbon Bridge'
        ];

        $landmarkDivisoria = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Divisoria'
            ];
        }, $landmarkDivisoria);

        $landmarkUnion = [
            'Road to Union Brgy Hall & JM Salon', 'Road to  Mauylab and Union Elementary school(Crossing)', 'Union Rice Mill', 'Bontoc - Tomas Opuss Boudaries'
        ];

        $landmarkUnion = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Bontoc',
                'Barangay' => 'Union'
            ];
        }, $landmarkUnion);

        $landmarkHigosoan = [
            'Higosoan Bridge', 
        ];

        $landmarkHigosoan = array_map(function ($landmark) {
            return [
                'Landmark' => $landmark,
                'TO_Municipality' => 'Tomas Oppus',
                'Barangay' => 'Higosoan'
            ];
        }, $landmarkHigosoan);

        DB::table('landmark')->insert($landmarkZone3);
        DB::table('landmark')->insert($landmarkZone2);
        DB::table('landmark')->insert($landmarkSanJose);
        DB::table('landmark')->insert($landmarkTampoong);
        DB::table('landmark')->insert($landmarkStaCruz);
        DB::table('landmark')->insert($landmarkCasao);
        DB::table('landmark')->insert($landmarkTalisay);
        DB::table('landmark')->insert($landmarkPoblacion);
        DB::table('landmark')->insert($landmarkStoNino);
        DB::table('landmark')->insert($landmarkDivisoria);
        DB::table('landmark')->insert($landmarkUnion);
        DB::table('landmark')->insert($landmarkHigosoan);
    }

    public function down()
    {
        Schema::dropIfExists('landmark');
    }
};