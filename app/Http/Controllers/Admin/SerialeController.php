<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SerialeCreateRequest;
use App\Model\Seriale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seriales = Seriale::paginate(10);

        return view('admin.seriale.index', compact('seriales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seriale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SerialeCreateRequest $request)
    {
        $seriale = new Seriale;
        $seriale->title = $request->title;
        $seriale->created_year = $request->created_year;
        $seriale->save();
        if ($request->has('image')) {
            $seriale->addMedia($request->image)->toMediaCollection('SerialePoster');
        }

        return redirect()->route('seriale.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seriale = Seriale::findOrFail($id);

        return view('admin.seriale.edit', compact('seriale'));
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
        $seriale = Seriale::findOrFail($id);

        $seriale->update([
            'title' => $request->title,
            'created_year' => $request->created_year
        ]);
        if ($request->has('image')) {
            $seriale->addMedia($request->image)->toMediaCollection('SerialePoster');
        }
        return redirect()->route('seriale.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seriale = Seriale::findOrFail($id);
        $seriale->delete();

        return redirect()->route('seriale.index');

    }
}
