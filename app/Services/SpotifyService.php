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

    public function search(string $query)
    {
        $token = $this->getAccessToken();

        $response = $this->searchRequest($token, $query);

        if($response->status() === 401) {
            Cache::forget('spotify_access_token');
            $token = $this->getAccessToken();
            $response = $this->searchRequest($token, $query);
        }

        return $response->json();
    }

    private function searchRequest(string $token, string $query) {
        return Http::withToken($token)
            ->get('https://api.spotify.com/v1/search', [
                'q' => $query,
                'type' => 'artist',
                'limit' => 10,
            ]);
    }
}