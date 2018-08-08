<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MovieCreateRequest;
use App\Model\Genre;
use App\Model\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('admin.movie.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieCreateRequest $request)
    {

        $movie = new Movie;
        $movie->title = $request->title;
        $movie->runing_time = $request->runing_time;
        $movie->release_date = $request->release_date;
        $movie->movie_description = $request->movie_description;
        $movie->save();
        if ($request->has('genre')) {
            $movie->genres()->attach($request->genre);
        }
        if ($request->has('image')) {
            $movie->addMedia($request->image)->toMediaCollection('poster');
        }

        return redirect()->route('movie.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();

        return view('admin.movie.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update([
            'title' => $request->title,
            'runing_tme' => $request->runing_time,
            'release_date' => $request->release_date,
            'movie_description' => $request->movie_description
        ]);
        $movie->genres()->sync($request->genre);
        if ($request->has('image')) {
            $movie->addMedia($request->image)->toMediaCollection('poster');
        }

        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->back();
    }
    public function addEmbed($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $embeds = $movie->embeds();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back();
    }
    public function addShikolinks($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $embeds = $movie->shikolinks();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back();
    }
    public function addShkarkolinks($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $embeds = $movie->shkarkolinks();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back();
    }
    public function addTrailerlinks($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $embeds = $movie->trailerlinks();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back();
    }

}
