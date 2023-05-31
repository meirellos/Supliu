<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Track;

class TrackController extends Controller
{

    //Procurando as faixas.
    public function search(Request $request){
        $trackName = $request->input('name');
        $tracks = Track::with('album')->where('name', 'like', "%$trackName%")->get();
        return view('tracks.search', compact('tracks'));
    }


    //Criando uma faixa pelo id do album.
    public function create($albumId)
    {
        //Criando nova faixa.
        $album = Album::findOrFail($albumId);

        return view('tracks.create', compact('album'));
    }

    //Salvando a faixa
    public function store(Request $request, Album $album, $albumId)
    {
        //Validação de dados.
    $request->validate([
        'name' => 'required',
    ]);

    //Criando a faixa.
    $track = new Track([
        'name' => $request->input('name'),
        'duration' => $request->input('duration')
    ]);

    //Encontrar album pelo ID
    $album = Album::findOrFail($albumId);

    //Salvar a faixa no Album
    $album->tracks()->save($track);

    //Redirecionar para a edição de albuns.
    return redirect()->route('albums.edit');
    }

    //Excluindo uma faixa.
    public function destroy(Album $album, Track $track, $id)
    {
        $track = Track::findOrFail($id);
        $track->delete();

        return redirect()->route('albums.edit');
    }
}
