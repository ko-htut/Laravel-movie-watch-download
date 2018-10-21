<?php

namespace App\Http\Controllers\Show;

use App\Model\Serie;
use App\Http\Controllers\Controller;
use SEOMeta;
use OpenGraph;
use Twitter;

class SeasonsController extends Controller
{
    public function show($slug,$season_nr)
    {
        $serie = Serie::where('slug', $slug)->first();
        $season = $serie->seasons->where('season_nr', $season_nr)->first();

        SEOMeta::setTitle($serie->title. ' sezoni nr: '. $season_nr. ' me titra shqip');
        SEOMeta::setDescription($serie->title. ',  seriale me titra shqip, shletoni filma24 per te pare filma dhe seriale me titra shqip ne HD');
        SEOMeta::addMeta('article:published_time', $serie->created_year, 'property');
        SEOMeta::addKeyword(['filma me titra shqip', 'Seriale me titra shqip', 'titra shqip']);

        OpenGraph::setDescription($serie->title. ',  seriale me titra shqip, shletoni filma24 per te pare filma dhe seriale me titra shqip ne HD');
        OpenGraph::setTitle($serie->title. ' sezoni nr: '. $season_nr . ' me titra shqip');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'al');
        OpenGraph::addProperty('locale:alternate', ['al', 'en-us']);

        OpenGraph::addImage($season->getFirstMediaUrl('posterSeason'));
        OpenGraph::addImage($season->getFirstMediaUrl('posterSeason'));
        OpenGraph::addImage([$season->getFirstMediaUrl('posterSeason'), 'size' => 300]);
        OpenGraph::addImage($season->getFirstMediaUrl('posterSeason'), ['height' => 300, 'width' => 300]);

        return view('series.seasons.show', compact('season'));
    }
}
