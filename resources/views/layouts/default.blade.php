<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('document-title')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{route("home")}}">Home</a></li>
                <li><a href="{{route("education")}}">Education</a></li>
                <li><a href="{{route("career")}}">Career</a></li>
                <li><a href="{{route("bands")}}">Music</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        @yield('main-content')
    </main>
    
    <footer>
        <div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quis nulla ab eaque similique dolor at ipsam cupiditate explicabo tempore. Debitis laboriosam, reiciendis aspernatur magnam dolorum consequatur ex optio recusandae!</p>
        </div>
    </footer>

</body>
</html>