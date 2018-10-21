<?php

namespace App\Http\Controllers\Admin;

use App\Model\Episode;
use App\Model\Season;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Movie;

class EpisodeController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Serie $serie, Season $season)
    {
        return view('admin.serie.season.episode.create', compact('serie', 'season'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Serie $serie, Season $season)
    {

        $episode = new Episode;
        $episode->title = $request->title;
        $season->episodes()->save($episode);

        return redirect()->route('season.edit', [$serie, $season]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie, Season $season, $id)
    {
        $episode = Episode::findOrFail($id);
        return view('admin.serie.season.episode.edit', compact('serie', 'season', 'episode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie, Season $season, $id)
    {
        $episode = Episode::findOrFail($id);
        $episode->update($request->all());

        return redirect()->route('season.edit', [$serie, $season])->with('message', 'episode u apdetua');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie, Season $season, $id)
    {
        $episode = Episode::findOrFail($id);
        $episode->delete();
        return redirect()->route('season.edit', [$serie->id, $season->id]);
    }

    public function addEmbed(Serie $serie, Season $season, $id, Request $request)
    {
        $episode = Episode::findOrFail($id);
        $embeds = $episode->embeds();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back()->with('message', 'ju shtuat nje embed link');
    }
    public function addWatchlink(Serie $serie, Season $season, $id, Request $request)
    {
        $episode = Episode::findOrFail($id);
        $watchlink = $episode->watchlinks();
        $watchlink->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back()->with('message', 'ju shtuat nje watch link');
    }
    public function addDownloadlink(Serie $serie, Season $season, $id, Request $request)
    {
        $episode = Episode::findOrFail($id);
        $downloadlink = $episode->downloadlinks();
        $downloadlink->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back()->with('message', 'ju shtuat nje download link');
    }
    public function addTrailerlink(Serie $serie, Season $season, $id, Request $request)
    {
        $episode = Episode::findOrFail($id);
        $trailerlink = $episode->trailerlinks();
        $trailerlink->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back()->with('message', 'ju shtuat nje trailer link');
    }
}
