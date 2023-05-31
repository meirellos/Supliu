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
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body>

    <div class="container">
        <div class="box">
            <div class="box-title">
                <a href="{{ route('albums') }}"> <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Tiao"></a>
                <h1>Discografia</h1>
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
                        <div class="album-title">
                            <p><strong>Álbum: {{ $album->name }}, {{ $album->date }}</strong></p>
                        </div>

                        <div class="album-content">

                            <table>
                                <thead>
                                    <tr>
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
                                            <td>{{ $track->duration }}</td>

                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>

                        </div>
                    @endforeach
                </div>
                <div class="login-index">
                    <a href="{{ route('login') }}">Editar</a>
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
