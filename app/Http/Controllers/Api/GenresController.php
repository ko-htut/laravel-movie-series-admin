<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GenreAllResource;
use App\Model\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return GenreAllResource::collection($genres);
    }
}
