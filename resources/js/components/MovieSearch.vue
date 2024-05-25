<!-- resources/js/components/MovieSearch.vue -->
<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://127.0.0.1:8000/movies/">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Movie by mood
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/movies/humor">Humor</a></li>
                                <li><a class="dropdown-item" href="/movies/cheerful">Cheerful</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <div class="col-md-auto">
                        <ul class="nav">
                            <li class="nav-item" v-if="!isAuthenticated">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item" v-if="!isAuthenticated">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            <li class="nav-item dropdown" v-else>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ url('/logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-auto">
                        <div class="search-container">
                            <form class="d-flex" role="search" @submit.prevent="loadMovies">
                                <input class="form-control me-2" type="search" placeholder="Search Movie Title ..." aria-label="Search" v-model="searchTerm">
                                <button class="btn btn-outline-success" type="button" @click="loadMovies">Search</button>
                            </form>
                        </div>
                        <div class="search-list" v-if="movies.length">
                            <div v-for="movie in movies" :key="movie.id" class="search-list-item" @click="loadMovieDetails(movie.id)">
                                <div class="search-item-thumbnail">
                                    <img :src="moviePoster(movie.poster_path)" alt="Movie Poster">
                                </div>
                                <div class="search-item-info">
                                    <h3>{{ movie.title }}</h3>
                                    <p>{{ movie.release_date }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            searchTerm: '',
            movies: [],
            isAuthenticated: false, // Update this based on actual authentication status
            apiKey: '99bd7e2d186aaa4b0d6193cda5489d69'
        };
    },
    methods: {
        async loadMovies() {
            if (this.searchTerm.trim().length > 0) {
                const url = `https://api.themoviedb.org/3/search/movie?api_key=${this.apiKey}&query=${this.searchTerm}`;
                const response = await fetch(url);
                const data = await response.json();
                if (data.results) {
                    this.movies = data.results;
                }
            }
        },
        moviePoster(path) {
            return path ? `https://image.tmdb.org/t/p/w200${path}` : 'image_not_found.png';
        },
        loadMovieDetails(movieId) {
            window.location.href = `http://127.0.0.1:8000/movies/detail/${movieId}`;
        }
    }
};
</script>

<style scoped>
.search-list-item {
    cursor: pointer;
    display: flex;
    margin-bottom: 10px;
}
.search-item-thumbnail img {
    width: 50px;
    height: 75px;
}
.search-item-info {
    margin-left: 10px;
}
</style>
