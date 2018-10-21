<?php

namespace App\Http\Controllers\Show;

use App\Model\Serie;
use App\Http\Controllers\Controller;
use SEOMeta;
use OpenGraph;
use Twitter;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::orderBy('created_at', 'desc')->paginate(12);
        return view('series.index', compact('series'));
    }

    public function show($slug)
    {
        $serie = Serie::where('slug', $slug)->first();

        SEOMeta::setTitle($serie->title. ' me titra shqip');
        SEOMeta::setDescription($serie->title. ', seriale me titra shqip, filma24 filma dhe seriale me titra shqip');
        SEOMeta::addMeta('article:published_time', $serie->release_date, 'property');
        SEOMeta::addKeyword(['filma me titra shqip', 'Seriale me titra shqip', 'titra shqip']);

        OpenGraph::setDescription($serie->title. ', seriale me titra shqip, filma24 filma dhe seriale me titra shqip');
        OpenGraph::setTitle($serie->title. ' me titra shqip');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'al');
        OpenGraph::addProperty('locale:alternate', ['al', 'en-us']);

        OpenGraph::addImage($serie->getFirstMediaUrl('posterSerie'));
        OpenGraph::addImage($serie->getFirstMediaUrl('posterSerie'));
        OpenGraph::addImage([$serie->getFirstMediaUrl('posterSerie'), 'size' => 300]);
        OpenGraph::addImage($serie->getFirstMediaUrl('posterSerie'), ['height' => 300, 'width' => 300]);

        return view('series.show', compact('serie'));
    }
}
