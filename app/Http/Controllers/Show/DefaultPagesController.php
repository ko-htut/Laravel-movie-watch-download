<?php

namespace App\Http\Controllers\Show;

use App\Model\Movie;
use App\Model\Serie;
use App\Http\Controllers\Controller;
use SEOMeta;
use OpenGraph;
use Twitter;


class DefaultPagesController extends Controller
{
    public function welcome()
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
        $series = Serie::orderBy('created_at', 'desc')->limit(4)->get();
        return view('welcome', compact('movies','series'));
    }
    public function contact()
    {
        SEOMeta::setTitle('Filma24 Stream | Contact filma24');
        SEOMeta::setDescription('Filma24.stream | website per te pare filma dhe seriale me titra shqip, seriale turke me titra shqip');
        SEOMeta::setCanonical(url()->current());
        return view('contact');
    }

    public function dmca()
    {
        SEOMeta::setTitle('Filma24 Stream | DMCA');
        SEOMeta::setDescription('Filma24.stream | website per te pare filma dhe seriale me titra shqip, seriale turke me titra shqip');
        SEOMeta::setCanonical(url()->current());
       return view('dmca');
    }

    public function privacy()
    {
        SEOMeta::setTitle('Filma24 Stream | Privacy Policy');
        SEOMeta::setDescription('Filma24.stream | website per te pare filma dhe seriale me titra shqip, seriale turke me titra shqip');
        SEOMeta::setCanonical(url()->current());
        return view('privacy');
    }
}
