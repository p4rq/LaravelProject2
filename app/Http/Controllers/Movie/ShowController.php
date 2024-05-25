<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ShowController extends Controller
{
    public function show($id)
    {
        // Выполните GET-запрос к API TMDb для получения информации о фильме с указанным идентификатором
        $movieId = $id; // Используйте переданный идентификатор фильма

        $response = Http::asJson()
            ->withOptions(['verify' => false]) // Отключить проверку SSL
            ->get(config('services.tmdb.endpoint')."movie/{$movieId}", [
                'api_key' => config('services.tmdb.api'),
            ]);

        $data = $response->json(); // Получить данные о фильме
        // Проверяем, существует ли ключ 'poster_path' в ответе
        if (isset($movie['poster_path'])) {
            $posterPath = $movie['poster_path'];
        } else {
            // Если ключ 'poster_path' отсутствует, установим его в null или какое-то значение по умолчанию
            $posterPath = null; // Или установите любое другое значение по умолчанию
        }
        // Кэшируем результат

        return view('show', compact('data'));
    }

}

