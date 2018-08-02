<?php

namespace App\Http\Controllers\Show;

use App\Model\Seriale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerialeController extends Controller
{
    public function index()
    {
        $seriales = Seriale::all();

        return view('seriale.index', compact('seriales'));
    }
}
