<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Supliu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="box-content">

                <div class="text-center">
                    <a href="" class="logo-supliu"><img src="{{ asset('assets/img/supliu-logo.png') }}"
                            alt="">SupliuFy</a>
                    <p>LOGIN</p>
                </div>
                <div class="box-form">
                    <form action="{{ route('login.action') }}" method="POST" class="user">
                        @csrf
                        <!-- Proteção de dados de formulário -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <input name="email" type="email" class="form-control form-control-user" aria-describedby="emailHelp"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control form-control-user" placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Lembrar de mim!</label>
                            </div>
                        </div>
                        <button type="submit" class="btn ">Login</button>
                        <div class="text-center">
                            <a href="{{ route('register') }}" class="ref-register">Não tem uma conta? Crie uma agora!</a> <br/>
                            <a href="{{ route('albums') }}" class="ref-albums">Visualizar albuns</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
