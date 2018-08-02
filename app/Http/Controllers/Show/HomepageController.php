<?php

namespace App\Http\Controllers\Show;

use App\Model\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $movies = DB::table('movies')->orderBy('created_at', 'desc')->paginate(20);
        return view('welcome', compact('genres', 'movies'));

    }
}
