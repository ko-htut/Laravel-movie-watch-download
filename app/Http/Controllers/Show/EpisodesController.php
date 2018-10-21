<?php

namespace App\Http\Controllers\Show;

use App\Model\Episode;
use App\Http\Controllers\Controller;
use SEOMeta;
use OpenGraph;
use Twitter;

class EpisodesController extends Controller
{
    public function show($slug)
    {
        $episode = Episode::where('slug', $slug)->first();
        $season = $episode->season;

        SEOMeta::setTitle($episode->title);
        SEOMeta::setDescription($episode->description. ', filma me titra shqip');
        SEOMeta::addMeta('article:published_time', $episode->release_date, 'property');
        SEOMeta::addKeyword(['filma me titra shqip', 'Seriale me titra shqip', 'titra shqip']);

        OpenGraph::setDescription($episode->description);
        OpenGraph::setTitle($episode->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'al');
        OpenGraph::addProperty('locale:alternate', ['al', 'en-us']);

        OpenGraph::addImage($season->getFirstMediaUrl('posterSeason'));
        OpenGraph::addImage($season->getFirstMediaUrl('posterSeason'));
        OpenGraph::addImage([$season->getFirstMediaUrl('posterSeason'), 'size' => 300]);
        OpenGraph::addImage($season->getFirstMediaUrl('posterSeason'), ['height' => 300, 'width' => 300]);

        return view('episodes.show', compact('episode'));
    }
}
