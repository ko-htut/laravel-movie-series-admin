<?php

namespace App\Http\Controllers\Admin;

use App\Model\Shikolink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShikolinkController extends Controller
{
    public function destroy($id)
    {
        $embed = Shikolink::findOrFail($id);
        $embed->delete();
        return back();
    }
}
