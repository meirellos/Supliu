<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Track;

class TrackController extends Controller
{

    public function index(Album $album)
    {
        //
        return view('tracks.index');
    }

    public function search(Request $request){
        $trackName = $request->input('name');
        $tracks = Track::with('album')->where('name', 'like', "%$trackName%")->get();
        return view('tracks.search', compact('tracks'));
    }


    public function create($albumId)
    {
        //Criando nova faixa.
        $album = Album::findOrFail($albumId);

        return view('tracks.create', compact('album'));
    }


    public function store(Request $request, Album $album, $albumId)
    {
        //Salvando a faixa

    $request->validate([
        'name' => 'required',
    ]);

    $track = new Track([
        'name' => $request->input('name'),
        'duration' => $request->input('duration'),
        // Outros campos da faixa
    ]);

    //Encontrar album pelo ID
    $album = Album::findOrFail($albumId);

    //Salvar a faixa no Album
    $album->tracks()->save($track);

    // Redirecionar ou retornar uma resposta de sucesso
    return redirect()->route('tracks')->with('success', 'Faixa adicionada ao álbum com sucesso!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Album $album, Track $track, $id)
    {
        $track = Track::findOrFail($id);
        $track->delete();

        return redirect()->route('albums')->with('success', 'Album excluido com sucesso!');
    }
}
