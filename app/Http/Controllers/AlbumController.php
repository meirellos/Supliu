<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Track;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Exibir todos os albuns e faixas:
    public function index()
    {

        $albums = Album::with('tracks')->get();
        return view('albums.index', compact('albums'));
    }

    //Procurar todos os albums pelo nome

    public function search(Request $request){
        $albumName = $request->input('name');
        $albums = Album::with('tracks')->where('name', 'like', "%$albumName%")->get();
        return view('albums.search', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Criando um novo album
    public function create()
    {
        //Chamando a view create.
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Salvar o album novo.
    public function store(Request $request)
    {

        /* Album::create($request->all());
        return redirect()->route('albums')->with('success', 'Produto adicionado com sucesso!');*/


        //Validação dos dados
        $request->validate([
            'name' => 'required|string',
            'date' => 'required',
        ]);

        //Criando o album
        $album = new Album;
        $album->image = $request->input('image');
        $album->name = $request->input('name');
        $album->date = $request->input('date');

        //Salvando o album no bd
        $album->save();

        return redirect()->route('albums')->with('success', 'Album adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Excluir um Album
        /* $album = Album::findOrFail($id);

        $album->delete();

        return redirect()->route('albums')->with('success', 'Álbum excluído com sucesso!');
    */
        $album = Album::findOrFail($id);
        $album->tracks()->delete();
        $album->delete();

        return redirect()->route('albums')->with('success', 'Album excluido com sucesso!');
    }
}
