<?php

namespace App\Http\Controllers\Show;

use App\Model\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function __construct()
    {
        $genres = Genre::all();
        return $genres;
    }
    public function ShowByGenreSlug($slug)
    {
        $genre = Genre::where('slug', $slug)->first();

        return view('genre.index', compact('genre'));

    }
}
