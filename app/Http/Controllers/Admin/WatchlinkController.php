<?php

namespace App\Http\Controllers\Admin;

use App\Model\Watchlink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WatchlinkController extends Controller
{
    public function destroy($id)
    {
        $embed = Watchlink::findOrFail($id);
        $embed->delete();
        return back()->with('message', 'Watchlink u fshij');

    }
}
