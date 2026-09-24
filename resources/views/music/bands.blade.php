@extends('layouts.default')

@section('document-title')
<title>My Music</title>
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

    <hr>

@endforeach

@endsection