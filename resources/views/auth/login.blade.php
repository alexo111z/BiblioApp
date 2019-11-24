<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Inicio de Sesión | Biblio App</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                background-color: #dddddd !important;
            }

            main {
                margin-bottom: 200px;
            }

            .navbar {
                margin-bottom: 0 !important;
            }

            .navbar-brand{
                float: initial !important;
                padding-top: 10px !important;
                color: #363636 !important;
            }

            .navbar-brand > img {
                width: 64px !important;
                display: inline;
            }

            .navbar {
                background-color: #fbfbfb !important;
            }

            .navbar-collapse {
                margin: 0 !important;
            }

            .navbar .navbar-nav > li > a {
                color: #363636 !important;
                padding: 10px !important;
                margin-top: 11px;
            }

            .navbar .navbar-nav > .open > a,
            .navbar .navbar-nav > .open > a:hover,
            .navbar .navbar-nav > .open > a:focus,
            .navbar .navbar-nav > li > a:hover {
                color: white !important;
                background-color: #6d356c !important;
                border-color: none !important;
                box-shadow: none !important;
            }

            .footer {
                width: 100%;
                position: fixed !important;
                bottom: 0 !important;
                left: 0 !important;
                background-color: #363636 !important;
                padding: 3rem 0 !important;
                color: white !important;
                font-size: 16px;
                z-index: 100000;
            }

            .card form .label {
                color: #363636 !important;
            }

            .card > .card-header {
                text-align: center;
                font-size: 18px;
            }

            a {
                color: #2da19a;
            }

            @media screen and (min-width: 768px) {
                .login {
                    width: 500px;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    margin-top: calc((272.062px / 2) * -1);
                    margin-left: -250px;
                }
            }

            .login button[type=submit] {
                background-color: #6d356c;
                border-color: #6d356c;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('images/LogoTec.png') }}"/>
                            Biblio App ®
                        </a>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="panel panel-default login">
                    <div class="panel-heading">Iniciar Sesión</div>

                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="Nick" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="Nick" name="Nick" type="text" class="form-control @error('Nick') is-invalid @enderror" value="{{ old('Nick') }}" required autocomplete="Nick" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('Password') is-invalid @enderror" name="Password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Entrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

            <footer class="footer align-items-center container-fluid text-center">
                <span>Copyright © Tec MM campus Vallarta 2020 Todos los derechos reservados</span>
            </footer>
        </div>
    </body>
</html>
