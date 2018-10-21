<?php

namespace App\Http\Controllers\Show;

use App\Model\Genre;
use App\Http\Controllers\Controller;
use SEOMeta;
use OpenGraph;
use Twitter;

class GenresController extends Controller
{
    public function show($slug)
    {
        $genre = Genre::where('slug', $slug)->first();
        SEOMeta::setTitle('Filma '.$genre->name. ' me titra shqip');
        SEOMeta::setDescription('Filma24 Stream | Shikoni filma '. $genre->name .' me titra shqip ne formatin HD, shfletoni faqen tone per te pare filma dhe seriale me titra shqip');

        OpenGraph::setDescription('Filma24 Stream | Shikoni filma '. $genre->name .' me titra shqip ne formatin HD, shfletoni faqen tone per te pare filma dhe seriale me titra shqip');
        OpenGraph::setTitle('Filma '.$genre->name. ' me titra shqip');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'al');
        OpenGraph::addProperty('locale:alternate', ['al', 'en-us']);

        OpenGraph::addImage(asset('img/logo.png'));

        $movies = $genre->movies()->paginate(12);
        return view('genres.show', compact('movies'));
    }
}
