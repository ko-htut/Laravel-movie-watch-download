<?php

namespace App\Http\Controllers\Show;

use App\Model\Movie;
use App\Http\Controllers\Controller;
use SEOMeta;
use OpenGraph;
use Twitter;

class MoviesController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Filma24 Stream | Filma dhe seriale me titra shqip');
        SEOMeta::setDescription('Filma24.stream | website per te pare filma dhe seriale me titra shqip, seriale turke me titra shqip');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('Filma24.stream | website per te pare filma dhe seriale me titra shqip, seriale turke me titra shqip');
        OpenGraph::setTitle('Filma24 Stream | Filma dhe seriale me titra shqip');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'movies');
        OpenGraph::addImage(asset('img/logo.png'));
        $movies = Movie::orderBy('created_at', 'desc')->paginate(12);
        return view('movies.index', compact('movies'));
    }

    public function show($slug)
    {
        $movie = Movie::where('slug', $slug)->first();

        SEOMeta::setTitle($movie->title);
        SEOMeta::setDescription($movie->description. ', filma me titra shqip');
        SEOMeta::addMeta('article:published_time', $movie->release_date, 'property');
        SEOMeta::addMeta('article:section', $movie->category, 'property');
        SEOMeta::addKeyword(['filma me titra shqip', 'Seriale me titra shqip', 'titra shqip']);

        OpenGraph::setDescription($movie->description);
        OpenGraph::setTitle($movie->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'al');
        OpenGraph::addProperty('locale:alternate', ['al', 'en-us']);

        OpenGraph::addImage($movie->getFirstMediaUrl('poster'));
        OpenGraph::addImage($movie->getFirstMediaUrl('poster'));
        OpenGraph::addImage([$movie->getFirstMediaUrl('poster'), 'size' => 300]);
        OpenGraph::addImage($movie->getFirstMediaUrl('poster'), ['height' => 300, 'width' => 300]);
        return view('movies.show', compact('movie'));
    }
}
