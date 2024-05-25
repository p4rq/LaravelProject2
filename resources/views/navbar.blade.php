<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="http://127.0.0.1:8000/movies/">Navbar</a>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Link</a>
            <div class="dropdown">
                <button class="dropbtn">Movie by mood</button>
                <div class="dropdown-content">
                    <a href="/movies/humor">Humor</a>
                    <a href="/movies/cheerful">Cheerful</a>
                    <a href="#">Something else here</a>
                </div>
            </div>
            <a href="#" class="disabled">Disabled</a>
        </div>
        <div class="auth-links">
            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @else
                <div class="dropdown">
                    <button class="dropbtn"><i class="fa fa-user"></i></button>
                    <div class="dropdown-content">
                        <a href="/profile">Profile</a>
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </div>
                </div>
            @endguest

                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
        </div>
        <div class="search-container">
            <input type="text" id="movie-search-box" placeholder="Search Movie Title ...">
            <button onclick="loadMovies();">Search</button>
            <div id="search-list"></div>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
