<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run()
    {
        // Define fixed seat numbers and corresponding barangay/municipality data
        $seatData = [
            [
                'seat_number' => 'Seat 1',
                'barangay' => 'Zone 3',
                'municipality' => 'Sogod',
            ],
            [
                'seat_number' => 'Seat 1',
                'barangay' => 'Divisoria',
                'municipality' => 'Bontoc',
            ],
            [
                'seat_number' => 'Seat 1',
                'barangay' => 'Banday',
                'municipality' => 'Tomas Oppus',
            ],
            [
                'seat_number' => 'Seat 2',
                'barangay' => 'Zone 3',
                'municipality' => 'Sogod',
            ],
            [
                'seat_number' => 'Seat 2',
                'barangay' => 'Divisoria',
                'municipality' => 'Bontoc',
            ],
            [
                'seat_number' => 'Seat 2',
                'barangay' => 'Banday',
                'municipality' => 'Tomas Oppus',
            ],
        ];

        // Insert records into the 'locations' table with existing latitude and longitude
        $locations = [];
        foreach ($seatData as $data) {
            $barangay = $data['barangay'];
            $municipality = $data['municipality'];

            // Fetch latitude and longitude from your existing data based on the barangay and municipality
            // Replace the following lines with actual latitude and longitude retrieval logic
            $latitude = $this->getLatitude($barangay, $municipality);
            $longitude = $this->getLongitude($barangay, $municipality);

            $locations[] = [
                'seat_number' => $data['seat_number'],
                'barangay' => $barangay,
                'municipality' => $municipality,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ];
        }

        // Insert the generated records into the 'locations' table
        DB::table('locations')->insert($locations);
    }

    // Replace these methods with actual logic to fetch latitude and longitude
    private function getLatitude($barangay, $municipality)
    {
        if ($barangay === 'Zone 3' && $municipality === 'Sogod') {
            return 10.385212069297546; // Replace with actual latitude
        }
        if ($barangay === 'Divisoria' && $municipality === 'Bontoc') {
            return 10.343717199667726; // Replace with actual latitude
        }
        if ($barangay === 'Banday' && $municipality === 'Tomas Oppus') {
            return 10.313871854333827; // Replace with actual latitude 
        }
        
    }

    private function getLongitude($barangay, $municipality)
    {
        if ($barangay === 'Zone 3' && $municipality === 'Sogod') { 
            return 124.98276520436886; // Replace with actual latitude 
        }
        if ($barangay === 'Divisoria' && $municipality === 'Bontoc') {
            return 124.96388754541408; // Replace with actual latitude 
        }
        if ($barangay === 'Banday' && $municipality === 'Tomas Oppus') {
            return 124.9728009160974; // Replace with actual latitude 
        }
    }

}
