<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Faixa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/create-track-styles.css') }}">
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="content">
                <div class="text-center">
                    <h1>Criar nova faixa</h1>
                </div>
                <div class="box-form">
                    <form action="{{ route('tracks.store', ['albumId' => $album->id]) }}" method="POST">
                        @csrf
                        <label for="name">Nome da Faixa*</label>
                        <input type="text" name="name" required>

                        <label for="duration">Duração*</label>
                        <input type="text" name="duration" id="duration"  required>

                        <!-- Outros campos da faixa -->
                        <button type="submit" class="btn btn-primary">Adicionar Faixa</button>
                    </form>

                    <a href="{{ route('albums') }}" class="ref-albums">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
