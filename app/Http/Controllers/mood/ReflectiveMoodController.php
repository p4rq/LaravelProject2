<?php

namespace App\Http\Controllers\mood;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ReflectiveMoodController extends Controller
{

    public function reflective(){

        // Проверяем, есть ли закэшированный результат
//        $cachedData = Cache::get('cheerful_movie');
//        if ($cachedData) {
//            return view('demo', compact('cachedData'));
//        }

        // Получаем список всех фильмов в жанре "комедия" (жанр с ID 35)
        $response = Http::asJson()
            ->withOptions(['verify' => false]) // Отключить проверку SSL
            ->get(config('services.tmdb.endpoint').'discover/movie', [
                'api_key' => config('services.tmdb.api'),
                'with_genres' => 99, // ID жанра комедия
            ]);

        $movies = $response->json()['results'];

        // Выбираем случайный фильм из списка
        $randomMovie = $movies[array_rand($movies)];

        // Получаем дополнительную информацию о случайном фильме
        $data = Http::asJson()
            ->withOptions(['verify' => false]) // Отключить проверку SSL
            ->get(config('services.tmdb.endpoint').'movie/'.$randomMovie['id']. '?api_key='.config('services.tmdb.api'));

        // Кэшируем результат
        Cache::put('cheerful_movie', $data, now()->addHours(24));

        return view('demo', compact('data'));
    }

}
