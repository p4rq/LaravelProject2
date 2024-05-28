@extends('navbar')
@section('content')
    <body class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($popularMoviesPaginated as $movie)
                    <div class="col">
                        <div class="bg-white dark:bg-gray-900 shadow rounded-lg overflow-hidden">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" class="w-full h-auto" alt="{{ $movie['title'] }} Poster">
                            <div class="p-4">
                                <h5 class="text-lg font-semibold mb-2">{{ $movie['title'] }}</h5>
                                <p class="text-gray-700 dark:text-gray-300">{{ \Illuminate\Support\Str::limit($movie['overview'], 100) }}</p>
                                <a href="/movies/detail/{{$movie['id']}}" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $popularMoviesPaginated->links() }}
            </div>
        </div> <!-- end popular-movies -->
    </div>

    <script type="module">

    </script>
    </body>
@endsection
