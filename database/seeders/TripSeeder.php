<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Trip;
use App\Models\TripLocation;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artist = Artist::where('artist_name', 'Dead Set')->firstOrFail();
        $trip = Trip::create([
            'artist_id' => $artist->id,
            'name' => 'Eternal Love Tour'
        ]);

        // Eternal Love Tour Tour Dates
        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'Colorado Springs, Colorado',
            'latitude' => 38.8339,
            'longitude' => -104.8214,
            'sequence' => 1
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'Alburquerque, New Mexico',
            'latitude' => 35.08449,
            'longitude' => -106.65114,
            'sequence' => 2
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'Tempe, Arizona',
            'latitude' => 33.427204,
            'longitude' => -111.939896,
            'sequence' => 3
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'Chula Vista, California',
            'latitude' => 32.6401,
            'longitude' => -117.0842,
            'sequence' => 4
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'Murrieta, California',
            'latitude' => 33.554,
            'longitude' => -117.214,
            'sequence' => 5
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'Upland, California',
            'latitude' => 34.0975,
            'longitude' => -117.648,
            'sequence' => 6
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'Las Vegas, Nevada',
            'latitude' => 36.188110,
            'longitude' => -115.176468,
            'sequence' => 7
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'St. George, Utah',
            'latitude' => 37.1041,
            'longitude' => -113.5840,
            'sequence' => 8
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'Flagstaff, Arizona',
            'latitude' => 35.198284,
            'longitude' => -111.651299,
            'sequence' => 9
        ]);

        TripLocation::create([
            'trip_id' => $trip->id,
            'location' => 'Shiprock, New Mexico',
            'latitude' => 36.785543,
            'longitude' => -108.687032,
            'sequence' => 10
        ]);
    }
}
