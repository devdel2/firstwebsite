<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Spotify Search</title>
</head>

<body>

    <h1>Spotify Artist Search</h1>

    <form method="GET" action="/spotify/search">

        <input
            type="text"
            name="query"
            value="{{ $query }}"
            placeholder="Search for an artist..."
        >

        <button type="submit">
            Search
        </button>

    </form>

    @if (!empty($results['artists']['items']))

        <h2>Results</h2>

        @foreach ($results['artists']['items'] as $artist)

            <div>
                <h3>{{ $artist['name'] }}</h3>

                <p>
                    Spotify ID: {{ $artist['id'] }}
                </p>

                @if (!empty($artist['external_urls']['spotify']))
                    <a
                        href="{{ $artist['external_urls']['spotify'] }}"
                        target="_blank"
                    >
                        Open in Spotify
                    </a>
                @endif
            </div>

            <hr>

        @endforeach

    @elseif ($query)

        <p>No artists found.</p>

    @endif

</body>
</html>