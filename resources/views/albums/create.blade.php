<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/create-styles.css') }}">
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="content">
                <div class="text-center"><h1>Criar novo album</h1></div>
                <div class="box-form">
                <form action="{{ route('albums.store') }}" method="POST">
                    @csrf
                    <input type="text" name="image" placeholder="Imagem do álbum">

                    <input type="text" name="name" placeholder="Nome do álbum*" >

                    <input type="text" name="date" placeholder="Data do álbum*" >

                    <button type="submit" class="btn">Adicionar álbum</button>
                </form>

                <a href="{{ route('albums') }}" class="ref-albums">Voltar</a>
            </div>
            </div>
        </div>
    </div>
</body>

</html>
