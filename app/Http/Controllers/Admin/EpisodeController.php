<?php

namespace App\Http\Controllers\Admin;

use App\Model\Episode;
use App\Model\Seriale;
use App\Model\Sezone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seriale $seriale, Sezone $sezone)
    {
        $episodes = $sezone->episodes();

        return view('admin.seriale.sezone.episode.index', compact('seriale', 'sezone', 'episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Seriale $seriale, Sezone $sezone)
    {
        return view('admin.seriale.sezone.episode.create', compact('seriale', 'sezone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Seriale $seriale,Sezone $sezone)
    {
        $sezone->episodes()->create([
            'title' => $request->title
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seriale $seriale,Sezone $sezone, $id)
    {
        $episode = Episode::findOrFail($id);

        return view('admin.seriale.sezone.episode.edit', compact('seriale', 'sezone', 'episode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seriale $seriale,Sezone $sezone, $id)
    {
        $episode = Episode::findOrFail($id);
        $episode->update([
            'title' => $request->title
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seriale $seriale,Sezone $sezone, $id)
    {
        $episode = Episode::findOrFail($id);
        $episode->delete();

        return redirect()->back();
    }

    public function addEmbed(Seriale $seriale,Sezone $sezone, $id, Request $request)
    {
        $episode = Episode::findOrFail($id);
        $embeds = $episode->embeds();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);
        return back();
    }
    public function addShikolinks(Seriale $seriale,Sezone $sezone, $id, Request $request)
    {
        $episode = Episode::findOrFail($id);
        $embeds = $episode->shikolinks();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);
        return back();
    }
    public function addShkarkolinks(Seriale $seriale,Sezone $sezone, $id, Request $request)
    {
        $episode = Episode::findOrFail($id);
        $embeds = $episode->shkarkolinks();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);
        return back();
    }
    public function addTrailerlinks(Seriale $seriale,Sezone $sezone, $id, Request $request)
    {
        $episode = Episode::findOrFail($id);
        $embeds = $episode->trailerlinks();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' =>  $request->web_url,
        ]);
        return back();
    }
}
