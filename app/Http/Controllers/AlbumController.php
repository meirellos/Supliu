<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Track;

class AlbumController extends Controller
{
    
    //Exibir todos os albuns e faixas:
    public function index()
    {
        $albums = Album::with('tracks')->get();
        return view('albums.index', compact('albums'));
    }

    //Procurar todos os albums pelo nome
    public function search(Request $request){
        //Pesquisando pelo input name
        $albumName = $request->input('name');

        //Albums com faixas, onde o nome do album é igual ao input.
        $albums = Album::with('tracks')->where('name', 'like', "%$albumName%")->get();

        //Retornando para a view search
        return view('albums.search', compact('albums'));
    }

    //Criando um novo album
    public function create()
    {
        //Chamando a view create.
        return view('albums.create');
    }

    //Salvar o album novo.
    public function store(Request $request)
    {
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

        //Redirecionando para a edição de albums
        return redirect()->route('albums.edit');
    }

    //Mostrando os albums.
    public function show(Album $album)
    {
        
        return view('albums.show', compact('album'));
    }

    //Editando os albums.
    public function edit()
    {
        $albums = Album::with('tracks')->get();
        return view('albums.edit', compact('albums'));
    }

    //Atualizar um album caso necessário.
    public function update(Request $request, $id)
    {
        //
    }

    //Excluir um Album
    public function destroy($id)
    {
        //Se achar o id, delete.
        $album = Album::findOrFail($id);
        $album->tracks()->delete();
        $album->delete();

        return redirect()->route('albums.edit');
    }
}
