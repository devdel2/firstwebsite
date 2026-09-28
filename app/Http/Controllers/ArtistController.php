<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Trip;
use App\Services\SpotifyService;

class ArtistController extends Controller
{
    // get all the artists in the local db, created by the seeder
    public function index(SpotifyService $spotify){
        $spotifyIds = Artist::pluck('spotify_id')->toArray();
        $artists = $spotify->getArtists($spotifyIds);
        $trips = Trip::with([
            'artist',
            'locations' => function ($query) {
                $query->orderBy('sequence');
            }
        ])->get();
        return view('music.bands', [
            'artists' => $artists,
            'trips' => $trips,
        ]);
    }
}
