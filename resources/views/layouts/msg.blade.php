<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('css/logo.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Koudami') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="{{ asset('icofont/icofont.min.css')}}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"><script src="{{ asset('js/language.js')}}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="header">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Koudami
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                      
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-primary fr"  href="{{ route('login') }}">Se connecter</a>
                                </li>
                                <li class="nav-item ar" >
                                    <a class="btn btn-primary"  href="{{ route('login') }}">الدخول</a>
                                </li>
                           
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item fr">
                                    <a class="btn btn-primary" href="{{ route('register') }}">S'inscrire</a>
                                </li>
                                <li class="nav-item ar" >
                                    <a class="btn btn-primary" href="{{ route('register') }}">التسجيل</a>
                                </li>
                         
                                @endif
                        @else
                            <li class="nav-item dropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                    @csrf
                                    <button type="submit" class="btn btn-danger"> Quitter</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
