<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SpotifyService
{
    public function getAccessToken()
    {
        return Cache::remember(
            'spotify_access_token',
            3500,
            function() {
                $response = Http::asForm()
                    ->withBasicAuth(
                        config('services.spotify.client_id'),
                        config('services.spotify.client_secret')
                    )
                    ->post('https://accounts.spotify.com/api/token', [
                        'grant_type' => 'client_credentials',
                    ]);

                return $response->json('access_token');
            }
        );
    }

    public function getArtists(array $spotifyIds)
    { 
        $token = $this->getAccessToken();
        $artists = [];

        foreach($spotifyIds as $spotifyId){
            // try to get artist info using the current token
            $response = Http::withToken($token)
                ->get("https://api.spotify.com/v1/artists/{$spotifyId}");

            // if token returns bad auth, get new token and try again
            if ($response->status() === 401){
                Cache::forget('spotify_access_token');
                $token = $this->getAccessToken();
                $response = Http::withToken($token)
                    ->get("https://api.spotify.com/v1/artists/{$spotifyId}");
            }

            if($response->successful()) {
                $artists[] = $response->json();
            }
        }

        return $artists;
    }
  
}