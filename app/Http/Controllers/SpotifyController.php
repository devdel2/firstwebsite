<?php

namespace App\Http\Controllers;

use App\Services\SpotifyService;
use Illuminate\Http\Request;

class SpotifyController extends Controller
{
    public function search(Request $request, SpotifyService $spotify)
    {
        $query = $request->input('query');

        $results = [];

        if ($query) {
            $results = $spotify->search($query);
        }

        return view('spotify.search', [
            'results' => $results,
            'query' => $query,
        ]);
    }
}
