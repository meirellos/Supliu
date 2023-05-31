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
    <link rel="stylesheet" href="{{ asset('assets/css/edit-styles.css') }}">
</head>

<body>

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="navbar logged">

        <div class="col-md-3 logout">
            <span class="">
                <a class="user-logout" href="{{ route('logout') }}">
                    Logout
                </a>
            </span>
        </div>
        <div class="col-md-3 welcome">
            Bem vindo, {{ auth()->user()->name }}.

        </div>
        <div class="col-md-3 profile"><img class="img-profile rounded-circle" src="{{ asset('assets/img/user.webp') }}">
        </div>

    </div>


    </div>

    <div class="container">




        <div class="box">
            <div class="box-title">

                <a href="{{ route('albums') }}"> <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Tiao"></a>

                <h1>Painel Administrador</h1>

            </div>

            <div class="content">
                <p>Digite uma palavra chave:</p>

                <form action="{{ route('albums.search') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Min">
                        <button type="submit">Procurar</button>
                    </div>
                </form>

                <div class="albums">
                    @foreach ($albums as $album)
                        <div class="albums-container">
                            <div class="album-title">
                                <table>
                                    <thead>
                                        <tr>
                                            <th><strong> Álbum: {{ $album->name }},
                                                    {{ $album->date }} </strong>

                                            </th>
                                            <th>
                                                <form action="{{ route('albums.destroy', $album->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Excluir Álbum</button>
                                                </form>
                                            </th>
                                        </tr>
                                        <tr>

                                        </tr>
                                    </thead>
                                </table>

                            </div>

                            <div class="album-content">
                                <table>
                                    <thead>
                                        <tr class="">
                                            <th class="trackNumber">Nº</th>
                                            <th class="trackName">Faixa</th>
                                            <th class="trackDuration">Duração</th>
                                        </tr>
                                    </thead>
                                    @foreach ($album->tracks as $track)
                                        <tbody>
                                            <tr>
                                                <td> {{ $track->id }}</td>
                                                <td>{{ $track->name }}</td>
                                                <td>{{ $track->duration }} </td>
                                                <td>
                                                    <form action="{{ route('tracks.destroy', $track->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Excluir Faixa</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        </tbody>
                                    @endforeach


                                </table>

                                <button type="submit"><a
                                        href="{{ route('tracks.create', ['albumId' => $album->id]) }}">Criar nova
                                        Faixa</a></button>



                            </div>
                        </div>
                    @endforeach
                    <a href="{{ route('albums.edit') }}">Editar</a>
                    <a href="{{ route('albums.create') }}">Criar</a>

                </div>
            </div>

        </div>


    </div>

    </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
