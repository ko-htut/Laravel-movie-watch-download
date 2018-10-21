<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateSerieRequest;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::paginate(16);

        return view('admin.serie.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSerieRequest $request)
    {
        $serie = new Serie;
        $serie->create([
            'title' => $request->title,
            'created_year' => $request->created_year
        ]);
        if ($request->has('poster_path')) {
            $serie->addMedia($request->file('poster_path'))->toMediaCollection('posterSerie');
        }

        return redirect()->route('serie.index')->with('message', 'ju krijuat nje serie te re');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = Serie::findOrFail($id);
        return view('admin.serie.edit', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serie = Serie::findOrFail($id);
        $serie->update([
            'title' => $request->title,
            'created_year' => $request->created_year
        ]);
        if ($request->has('poster_path')) {
            $serie->addMedia($request->file('poster_path'))->toMediaCollection('posterSerie');
        }

        return redirect()->route('serie.index')->with('message', 'u apdetua me sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();
        return back()->with('message', 'u fshij');
    }
}
