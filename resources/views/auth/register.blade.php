<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro - Supliu</title>
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
                    <p>CADASTRO</p>
                </div>
                <div class="box-form">
                    <form action=" {{ route('register.save') }}" method="POST" class="user">
                        @csrf
                        <div class="form-group">
                            <input name="name" type="text"
                                class="form-control form-control-user @error('name')is-invalid @enderror"
                                placeholder="Nome">
                            @error('name')
                                <span class="invalid-feedback">Campo Invalido!</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="email" type="email"
                                class="form-control form-control-user @error('email')is-invalid @enderror"
                                placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback">Campo Invalido!</span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input name="password" type="password"
                                    class="form-control form-control-user @error('password')is-invalid @enderror"
                                    placeholder="Senha">
                                @error('password')
                                    <span class="invalid-feedback">Campo Invalido!</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input name="password_confirmation" type="password"
                                    class="form-control form-control-user @error('password_confirmation')is-invalid @enderror"
                                    placeholder="Repetir Senha">
                                @error('password_confirmation')
                                    <span class="invalid-feedback">Campo Invalido!</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn">Criar Conta</button>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="ref-login">Já tem uma conta? Faça login!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
