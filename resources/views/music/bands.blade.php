@extends('layouts.default')

@section('document-title')
<title>My Music</title>
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
@endsection

@section('main-content')
<h1>My Music</h1>

@foreach ($artists as $artist)

    <div>
        <h2>{{ $artist['name'] }}</h2>
        <img src="{{$artist['images'][0]['url']}}" alt="spotify profile photo">
        <a
            href="{{ $artist['external_urls']['spotify'] }}"
            target="_blank"
        >
            View on Spotify
        </a>
    </div>

@endforeach

<div id="map"></div>

@endsection

<script>
    async function initMap() {
        const { Map } = await google.maps.importLibrary("maps");
        const map = new Map(document.getElementById("map"), {
            center: {
                lat: 39.7392,
                lng: -104.9903
            },
            zoom: 6
        });
    }
</script>

<script async src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&loading=async&callback=initMap">
</script>