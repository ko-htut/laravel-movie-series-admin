<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GenreAllResource;
use App\Model\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Movie;
use App\Http\Resources\GenreResource;

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return GenreAllResource::collection($genres);
    }

    public function moviesBySlug($slug)
    {

        $genre = Genre::where('slug', $slug)->first();

        return new GenreResource($genre);
    }
}
