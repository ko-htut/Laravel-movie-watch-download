<?php

namespace App\Http\Controllers\Show;

use App\Model\Movie;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $movies = Movie::search($request->get('search'))->paginate(12);
            $series = Serie::search($request->get('search'))->paginate(12);
        } else {
            $movies = 'Nuk u gjet asnje';
            $series = 'Nuk u gjet asnje';
        }
        return view('search', compact('movies', 'series'));
    }
}
