<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Seriale;
use App\Http\Resources\SerieAllResource;
use App\Http\Resources\SerieResource;
use App\Model\Sezone;
use App\Http\Resources\SeasonResource;
use App\Model\Episode;
use App\Http\Resources\EpisodeResource;

class SerialeController extends Controller
{
    public function index()
    {
        $seriales = Seriale::orderBy('created_at', 'desc')->get();

        return SerieAllResource::collection($seriales);
    }

    public function show($slug)
    {
        $serial = Seriale::where('slug', $slug)->first();

        return new SerieResource($serial);
    }

    public function showSeason($seriale, $id)
    {
        $season = Sezone::findOrFail($id);

        return new SeasonResource($season);
    }
    public function showEpisode($seriale, $season, $slug)
    {
        $episode = Episode::where('slug', $slug)->first();

        return new EpisodeResource($episode);
    }
}
