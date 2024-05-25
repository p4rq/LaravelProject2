@extends('navbar')
@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                @foreach ($popularMoviesPaginated as $movie)
                    <div class="col">
                        <div class="card">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }} Poster">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie['title'] }}</h5>
                                <p class="card-text">{{ $movie['overview'] }}</p>
                                <a href="/movies/detail/{{$movie['id']}}" class="btn btn-primary">Details</a>
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
@endsection
