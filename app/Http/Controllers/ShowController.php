<?php


namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class ShowController extends Controller
{

    public function show()
    {
        // Выполните GET-запрос к API TMDb для получения списка популярных фильмов
// Получение значения параметра запроса "page"
        $page = request()->query('page', 1);

// Выполните GET-запрос к API TMDb для получения списка популярных фильмов
        $response = Http::withOptions(['verify' => false]) // Отключить проверку SSL
        ->get(config('services.tmdb.endpoint').'movie/popular', [
            'api_key' => config('services.tmdb.api'),
        ]);

        $popularMovies = $response->json()['results'];

// Пагинация
        $perPage = 10; // Количество элементов на странице
        $currentPageItems = array_slice($popularMovies, ($page - 1) * $perPage, $perPage);
        $popularMoviesPaginated = new LengthAwarePaginator($currentPageItems, count($popularMovies), $perPage);

// Передача пагинированных данных в представление
        return view('home', compact('popularMoviesPaginated'));
    }

}
