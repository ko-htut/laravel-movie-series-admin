<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SezoneCreateRequest;
use App\Model\Seriale;
use App\Model\Sezone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SezoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seriale $seriale)
    {
        $sezones = $seriale->sezones();

        return view('admin.seriale.sezone.index', compact('sezones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Seriale $seriale)
    {
        return view('admin.seriale.sezone.create', compact('seriale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SezoneCreateRequest $request, Seriale $seriale)
    {

        $seriale->sezones()->create([
            'sezone_nr' => $request->sezone_nr
        ]);

        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seriale $seriale,$id)
    {
        $sezone = Sezone::findOrFail($id);

        return view('admin.seriale.sezone.edit', compact('seriale', 'sezone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Seriale $seriale, $id)
    {
        $sezone = Sezone::findOrFail($id);
        $sezone->update([
            'sezone_nr' => $request->sezone_nr
        ]);
        if ($request->has('image')){
            $sezone->addMedia($request->image)->toMediaCollection('SezonePoster');
        }

        return redirect()->route('seriale.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seriale $seriale,$id)
    {
        $sezone = Sezone::findOrFail($id);
        $sezone->delete();

        return redirect()->back();
    }
}
