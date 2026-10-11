<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Runoff
        Artist::create([
            'spotify_id' =>'1JVlimdgudUHQ12d58lFL6',
            'artist_name' => 'Runoff',
            'instagram' => 'https://www.instagram.com/runoff_co/',
            'youtube' => 'https://www.youtube.com/@runoff_co'
        ]);

        // Dead Set
        Artist::create([
            'spotify_id' =>'08ZKvIjx53D1lzsARgY99G',
            'artist_name' => 'Dead Set',
            'instagram' => 'https://www.instagram.com/deadsetband/',
            'youtube' => 'https://www.youtube.com/@deadset2608'
        ]);

        // Tradition
        Artist::create([
            'spotify_id' =>'74HZ4WaeYQ7lqWuPVpq0cH',
            'artist_name' => 'Tradition',
            'instagram' => 'https://www.instagram.com/traditiontheband/',
            'youtube' => 'https://www.youtube.com/@Traditionband'
        ]);

        // Daisyhead
        Artist::create([
            'spotify_id' =>'4zJP0fLge8dHeJxvGVKT7n',
            'artist_name' => 'Daisyhead',
            'instagram' => 'https://www.instagram.com/daisyheadtn/',
            'youtube' => 'https://www.youtube.com/@daisyheadtheband'
        ]);

    }
}
