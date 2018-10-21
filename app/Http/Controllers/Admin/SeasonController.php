<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateSeasonRequest;
use App\Model\Season;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Serie $serie)
    {
        return view('admin.serie.season.create', compact('serie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Serie $serie, CreateSeasonRequest $request)
    {

        $season = new Season;
        $season->season_nr = $request->season_nr;
        $serie->seasons()->save($season);
        if ($request->has('poster_path')) {
            $season->addMedia($request->file('poster_path'))->toMediaCollection('posterSeason');
        }

        return redirect()->route('serie.edit', $serie->id)->with('message', 'ju krijuat nje season te ri');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie,$id)
    {
        $season = Season::findOrFail($id);

        return view('admin.serie.season.edit', compact('serie', 'season'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie,$id)
    {
        $season = Season::findOrFail($id);

        $season->update([
            $season->season_nr = $request->season_nr
        ]);
        if ($request->has('poster_path')) {
            $season->addMedia($request->file('poster_path'))->toMediaCollection('posterSeason');
        }
        return redirect()->route('serie.edit', $serie->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie,$id)
    {
        $season = Season::findOrFail($id);
        $season->delete();
        return redirect()->route('serie.edit', $serie->id);
    }
}
