<?php

namespace App\Http\Controllers\Admin;

use App\Model\Shkarkolink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShkarkolinkController extends Controller
{
    public function destroy($id)
    {
        $embed = Shkarkolink::findOrFail($id);
        $embed->delete();
        return back();
    }
}
