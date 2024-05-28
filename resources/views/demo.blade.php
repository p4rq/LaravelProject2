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
    <body class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <div class="container mx-auto p-4">
        <div class="result-container bg-white dark:bg-gray-900 shadow rounded-lg p-4">
            <div class="result-grid grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Movie information here -->
                <div class="movie-poster">
                    <img class="w-full h-auto rounded-lg"
                         src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $data['poster_path'] }}"
                         alt="Movie Poster">
                </div>
                <div class="movie-info col-span-2">
                    <h3 class="movie-title text-2xl font-bold">{{ $data['title'] }}
                        ({{ date('Y', strtotime($data['release_date'])) }})</h3>
                    <ul class="movie-misc-info list-none p-0 mt-2 mb-4">
                        <li class="year">Year: {{ $data['release_date'] }}</li>
                    </ul>
                    <div class="flex flex-wrap mb-4">
                        <span class="text-gray-500 mr-2">Rating:</span>
                        <span
                            class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-1 px-2 rounded-full text-sm">{{ $data['vote_average'] }}</span>
                        <span class="text-gray-500 ml-4 mr-2">Runtime:</span>
                        <span
                            class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-1 px-2 rounded-full text-sm">{{ $data['runtime'] }} mins</span>
                        <span class="text-gray-500 ml-4 mr-2">Genres:</span>
                        @foreach($data['genres'] as $genre)
                            <span
                                class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-1 px-2 rounded-full text-sm mr-2">{{ $genre['name'] }}</span>
                        @endforeach
                    </div>
                    <p class="plot"><b>Plot:</b> {{ $data['overview'] }}</p>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <form method="POST" action="{{ route('movies.save') }}">
                @csrf
                <input type="hidden" name="movie_id" value="{{ $data['id'] }}">
                <button type="submit" class="btn-save bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                    Сохранить
                </button>
            </form>
        </div>
        <div class="mt-4">
            <a href="{{ url()->current() }}" class="btn-next bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">Далее</a>
        </div>
        <div class="mt-4">
            <a href="http://127.0.0.1:8000/movies/"
               class="btn-exit bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Выйти</a>
        </div>
    </div>

    <script type="module">
        import {createApp} from 'vue';

    </script>
    </body>



    <!-- end of result container -->

    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>--}}
@endsection
{{--@endsection--}}
