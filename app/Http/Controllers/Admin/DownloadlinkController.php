<?php

namespace App\Http\Controllers\Admin;


use App\Model\Downloadlink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadlinkController extends Controller
{
    public function destroy($id)
    {
        $embed = Downloadlink::findOrFail($id);
        $embed->delete();
        return back()->with('message', 'Downloadlink u fshij');

    }
}
