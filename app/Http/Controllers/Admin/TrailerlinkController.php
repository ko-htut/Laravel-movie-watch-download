<?php

namespace App\Http\Controllers\Admin;

use App\Model\Trailerlink;
use App\Http\Controllers\Controller;

class TrailerlinkController extends Controller
{
    public function destroy($id)
    {
        $embed = Trailerlink::findOrFail($id);
        $embed->delete();
        return back()->with('message', 'Trailerlink u fshij');

    }
}
