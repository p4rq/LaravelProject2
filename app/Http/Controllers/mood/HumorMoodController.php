<?php

namespace App\Http\Controllers\mood;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HumorMoodController extends Controller
{

    public function humor(){

        // Получаем список всех фильмов в жанре "комедия" (жанр с ID 35)
        $response = Http::asJson()
            ->withOptions(['verify' => false]) // Отключить проверку SSL
            ->get(config('services.tmdb.endpoint').'discover/movie', [
                'api_key' => config('services.tmdb.api'),
                'with_genres' => 35, // ID жанра комедия
            ]);

        $movies = $response->json()['results'];

        // Выбираем случайный фильм из списка
        $randomMovie = $movies[array_rand($movies)];

        // Получаем дополнительную информацию о случайном фильме
        $data = Http::asJson()
            ->withOptions(['verify' => false]) // Отключить проверку SSL
            ->get(config('services.tmdb.endpoint').'movie/'.$randomMovie['id']. '?api_key='.config('services.tmdb.api'));

        return view('demo', compact('data'));
    }
}
