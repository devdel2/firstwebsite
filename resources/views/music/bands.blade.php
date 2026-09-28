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

<div id="map"></div>

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

@endsection

<script>

    // grabbing the location data
    const trips = @json($trips);

    // creates the map
    window.initMap = async function () {
        const { Map, Polyline } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary("marker");

        const map = new Map(document.getElementById("map"), {
            center: {
                lat: 39.7392,
                lng: -104.9903
            },
            zoom: 5,
            gestureHandling: "cooperative",
            mapId: "DEMO_MAP_ID"
        });

        //Loop through each trip
        trips.forEach(trip => {

            const bandColors = {
                "Dead Set": "#2b4162",
                "Tradition": "#5b7553",
                "Daisyhead": "#e55934"
            }

            const locations = trip.locations;

            console.log("Band: ", trip.artist.artist_name);
            console.log("Color: ", bandColors[trip.artist.artist_name]);

            // select color based on the band
            const routeColor = bandColors[trip.artist.artist_name];

            locations.forEach(location => {
                const pin = new PinElement({
                    background: routeColor,
                    borderColor: routeColor,
                    glyphColor: "#F4F9E9",
                    glyphText: location.sequence.toString()
                });

                const marker = new AdvancedMarkerElement({
                    map: map,
                    position: {
                        lat: Number(location.latitude),
                        lng: Number(location.longitude)
                    },
                    title: location.location
                });

                marker.append(pin);
            });

            // creating ordered array of lat/long based on the loaded sequence
            const path = locations.map(location => ({
                lat: Number(location.latitude),
                lng: Number(location.longitude)
            }));

            // add a duplicate of the first location to end of the path
            path.push(path[0]);

            // draw the route using polyline api
            const route = new Polyline({
                path: path,
                geodesic: true,
                strokeColor: routeColor,
                strokeOpacity: 1.0,
                strokeWeight: 4
            });

            route.setMap(map);
            
        });
    }
</script>

<script async src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&loading=async&callback=initMap">
</script>