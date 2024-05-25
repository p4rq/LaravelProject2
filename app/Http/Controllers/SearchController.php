<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $response = Http::get('https://api.themoviedb.org/3/search/movie?api_key=3b4c7f3f3b4c7f3f3b4c7f3f3b4c7f3f&query=' . $search);
        $movies = $response->json();
        return view('navbar', compact('movies'));
    }
}
