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
        $deadSet = Artist::where('artist_name', 'Dead Set')->firstOrFail();
        
        // ETERNAL LOVE TOUR - DEAD SET \\
        $eternalLove = Trip::create([
            'artist_id' => $deadSet->id,
            'name' => 'Eternal Love Tour'
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'Colorado Springs, Colorado',
            'latitude' => 38.8339,
            'longitude' => -104.8214,
            'sequence' => 1
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'Alburquerque, New Mexico',
            'latitude' => 35.08449,
            'longitude' => -106.65114,
            'sequence' => 2
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'Tempe, Arizona',
            'latitude' => 33.427204,
            'longitude' => -111.939896,
            'sequence' => 3
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'Chula Vista, California',
            'latitude' => 32.6401,
            'longitude' => -117.0842,
            'sequence' => 4
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'Murrieta, California',
            'latitude' => 33.554,
            'longitude' => -117.214,
            'sequence' => 5
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'Upland, California',
            'latitude' => 34.0975,
            'longitude' => -117.648,
            'sequence' => 6
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'Las Vegas, Nevada',
            'latitude' => 36.188110,
            'longitude' => -115.176468,
            'sequence' => 7
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'St. George, Utah',
            'latitude' => 37.1041,
            'longitude' => -113.5840,
            'sequence' => 8
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'Flagstaff, Arizona',
            'latitude' => 35.198284,
            'longitude' => -111.651299,
            'sequence' => 9
        ]);

        TripLocation::create([
            'trip_id' => $eternalLove->id,
            'location' => 'Shiprock, New Mexico',
            'latitude' => 36.785543,
            'longitude' => -108.687032,
            'sequence' => 10
        ]);

        // ETERNAL LOVE TOUR - DEAD SET \\
        $winterTour2017 = Trip::create([
            'artist_id' => $deadSet->id,
            'name' => 'Winter Tour 2017'
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Colorado Springs, Colorado',
            'latitude' => 38.8339,
            'longitude' => -104.8214,
            'sequence' => 1
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Albuquerque, New Mexico',
            'latitude' => 35.08449,
            'longitude' => -106.65114,
            'sequence' => 2
        ]);
        
        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Mesa, Arizona',
            'latitude' => 33.424564,
            'longitude' => -111.833267,
            'sequence' => 3
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Las Vegas, Nevada',
            'latitude' => 36.1692,
            'longitude' => -115.1407,
            'sequence' => 4
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Fresno, California',
            'latitude' => 36.7468,
            'longitude' => -119.7726,
            'sequence' => 5
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Sacramento, California',
            'latitude' => 38.5816,
            'longitude' => -121.4944,
            'sequence' => 6
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Redding, California',
            'latitude' => 40.5865,
            'longitude' => -122.3917,
            'sequence' => 7
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Grants Pass, Oregon',
            'latitude' => 42.4389,
            'longitude' => 123.3283,
            'sequence' => 8
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Portland, Oregon',
            'latitude' => 45.523064,
            'longitude' => -122.676483,
            'sequence' => 9
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Bremerton, Washington',
            'latitude' => 47.567,
            'longitude' => -122.633,
            'sequence' => 10
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Lewiston, Idaho',
            'latitude' => 46.392014,
            'longitude' => -117.010826,
            'sequence' => 11
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Boise, Idaho',
            'latitude' => 43.6188,
            'longitude' => 116.2150,
            'sequence' => 12
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Salt Lake City, Utah',
            'latitude' => 40.7608,
            'longitude' => -111.8910,
            'sequence' => 13
        ]);

        TripLocation::create([
            'trip_id' => $winterTour2017->id,
            'location' => 'Laramie, Wyoming',
            'latitude' => 41.3114,
            'longitude' => 105.5911,
            'sequence' => 14
        ]);

    }
}
