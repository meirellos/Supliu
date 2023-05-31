<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supliu - Playlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/search-styles.css') }}">
</head>

<body>

    <div class="container">
        <div class="box">
            <div class="box-title">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Tiao">
                <h1>Discografia</h1>
            </div>
            <div class="content">
                <p>Digite uma palavra chave:</p>

                <form action="{{ route('tracks.search') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Min">
                        <button type="submit">Procurar</button>
                    </div>
                </form>

                <div class="albums">
                    <h2>Música encontada:</h2>
                    <div class="album-item-faixa">
                        @foreach ($tracks as $track)
                            <p><strong>Nº: {{ $track->id }}</strong></p>
                            <p><strong>Nome: {{ $track->name }}</strong></p>
                            <p><strong>Duração: {{ $track->duration }}</strong></p>
                            <form action="{{ route('tracks.destroy', $track->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                            </br>
                        @endforeach
                    </div>

                </div>

                <a href="{{ route('albums.create') }}">Criar</a>
                <a href="{{ route('albums') }}">Voltar para a Listagem</a>
            </div>
        </div>
    </div>
</body>
