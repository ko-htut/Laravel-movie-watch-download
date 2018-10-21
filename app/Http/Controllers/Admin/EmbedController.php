<?php

namespace App\Http\Controllers\Admin;

use App\Model\Embed;
use App\Http\Controllers\Controller;

class EmbedController extends Controller
{
    public function destroy($id)
    {
        $embed = Embed::findOrFail($id);
        $embed->delete();
        return back()->with('message', 'Embed u fshij');

    }
}
