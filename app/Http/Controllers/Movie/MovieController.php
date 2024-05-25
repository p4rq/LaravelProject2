<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function save(Request $request)
    {
        $user = auth()->user();
        $movie = Movie::find($request->movie_id);

        if (!$movie) {
            return back()->withErrors('Invalid movie ID.');
        }

        // Prevent duplicate entries
        if (!$user->movies->contains($movie->id)) {
            $user->movies()->attach($movie->id);
        }

        return back()->with('success', 'Movie added to your list successfully!');
    }
}
