{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>Working with TMDb API in Laravel 9 - LaravelTuts</title>--}}

{{--    <!-- Fonts -->--}}
{{--    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">   <!-- TailwindCss CDN -->--}}
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>--}}

{{--</head>--}}
{{--<body class="antialiased">--}}
{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand" href="#">Navbar</a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#">Link</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        Dropdown--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                        <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                        <li><hr class="dropdown-divider"></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <form class="d-flex">--}}
{{--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
@extends('navbar')
@section('content')
    <div class="container">
        <div class="result-container">
            <div class="result-grid" id="result-grid">
                <!-- Movie information here -->
                <div class="movie-poster">
                    <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $data['poster_path'] }}" alt="Movie Poster">
                </div>
                <div class="movie-info">
                    <h3 class="movie-title">{{ $data['title'] }} ({{ date('Y', strtotime($data['release_date'])) }})</h3>
                    <ul class="movie-misc-info">
                        <li class="year">Year: {{ $data['release_date'] }}</li>
                    </ul>
                    <div class="flex flex-wrap mb-2">
                        <span class="text-gray-500">Rating:</span>
                        <span class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-1 px-2 rounded-full text-sm">{{ $data['vote_average'] }}</span>
                        <span class="text-gray-500 ml-2">Runtime:</span>
                        <span class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-1 px-2 rounded-full text-sm">{{ $data['runtime'] }} mins</span>
                        <span class="text-gray-500 mr-2">Genres:</span>
                        @foreach($data['genres'] as $genre)
                            <span class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-1 px-2 rounded-full text-sm mr-2">{{ $genre['name'] }}</span>
                        @endforeach
                    </div>
                    <p class="plot"><b>Plot:</b> {{ $data['overview'] }}</p>
                    <!-- Other movie details can be added here -->
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <button class="btn btn-primary">Сохранить</button>
    </div>

    <div class="container mt-3">
        <a href="http://127.0.0.1:8000/movies/" class="btn btn-success">Выйти</a>
    </div>



    <!-- end of result container -->

    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>--}}
@endsection
{{--@endsection--}}
