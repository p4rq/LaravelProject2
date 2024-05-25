// resources/js/app.js
import { createApp } from 'vue';
import MovieSearch from './components/MovieSearch.vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import '../css/app.css';

const app = createApp({
    components: {
        MovieSearch
    },
    template: '<MovieSearch />'
});

app.mount('#app');
// resources/js/app.js
document.addEventListener('DOMContentLoaded', function() {
    const movieSearchBox = document.getElementById('movie-search-box');
    const searchList = document.getElementById('search-list');
    let isSearchListOpen = false;

    const apiKey = '99bd7e2d186aaa4b0d6193cda5489d69';

    async function loadMovies() {
        const searchTerm = movieSearchBox.value.trim();
        if (searchTerm.length > 0) {
            const url = `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${searchTerm}`;
            const response = await fetch(url);
            const data = await response.json();
            if (data.results) {
                displayMovieList(data.results);
                isSearchListOpen = true;
            }
        }
    }

    function displayMovieList(movies) {
        searchList.innerHTML = '';
        movies.forEach(movie => {
            const movieListItem = document.createElement('div');
            movieListItem.dataset.id = movie.id;
            movieListItem.classList.add('search-list-item');

            const moviePoster = movie.poster_path ? `https://image.tmdb.org/t/p/w200${movie.poster_path}` : 'image_not_found.png';

            movieListItem.innerHTML = `
                <div class="search-item-thumbnail">
                    <img src="${moviePoster}">
                </div>
                <div class="search-item-info">
                    <h3>${movie.title}</h3>
                    <p>${movie.release_date}</p>
                </div>
            `;
            movieListItem.addEventListener('click', () => {
                const movieId = movie.id;
                loadMovieDetails(movieId);
            });

            searchList.appendChild(movieListItem);
        });
    }

    function loadMovieDetails(movieId) {
        window.location.href = `http://127.0.0.1:8000/movies/detail/${movieId}`;
    }

    movieSearchBox.addEventListener('input', loadMovies);

    document.addEventListener('click', (event) => {
        if (!searchList.contains(event.target) && isSearchListOpen) {
            searchList.innerHTML = '';
            isSearchListOpen = false;
        }
    });
});
