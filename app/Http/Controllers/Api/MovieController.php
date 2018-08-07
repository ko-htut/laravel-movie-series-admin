<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovieAllResource;
use App\Model\Movie;
use App\Http\Resources\MovieResource;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')->get();

        return MovieAllResource::collection($movies);
    }

    public function show($slug)
    {
        $movie = Movie::where('slug', $slug)->first();

        return new MovieResource($movie);
    }
}
