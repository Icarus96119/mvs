<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>mkhyp | Kundenverwaltung</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/new.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    @yield('css')
    <style media="screen">
    .btn-mkhyp {
        color: #fff;
        background-color: #f7a824;
        border-color: #f7a824;
      }

      .btn-mkhyp:hover {
        color: #fff;
        background-color: #ec9c15;
        border-color: #ad7008;
      }

      .btn-mkhyp:focus, .btn-mkhyp.focus {
        color: #fff;
        background-color: #ec9c15;
        border-color: #ad7008;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
      }

      .btn-mkhyp.disabled, .btn-mkhyp:disabled {
        color: #fff;
        background-color: #f7a824;
        border-color: #f7a824;
      }

      .btn-mkhyp:not(:disabled):not(.disabled):active, .btn-mkhyp:not(:disabled):not(.disabled).active,
      .show > .btn-mkhyp.dropdown-toggle {
        color: #fff;
        background-color: #ad7008;
        border-color: #005cbf;
      }

      .btn-mkhyp:not(:disabled):not(.disabled):active:focus, .btn-mkhyp:not(:disabled):not(.disabled).active:focus,
      .show > .btn-mkhyp.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
      }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="https://www.mkhyp.de/wp-content/uploads/2018/09/mkhyp_Logo_positiv_anfrage_klein.png">
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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/headmin') }}">Dashboard</a></li>
                       
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Kunden</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="/showcustomer/{{0}}">
                                    View All Customers
                                </a> -->
                                <a class="dropdown-item" href="{{route('kunden.index')}}">
                                    Kunden anzeigen
                                </a>
                                <a class="dropdown-item" href="{{ url('admin/kunden/create') }}">
                                    Kunden erstellen
                                </a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/support') }}">Support</a></li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <strong>{{ Auth::user()->name }}</strong>   <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('headmin.myprofile') }}">
                                        {{ __('Profil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class=" btn btn-mkhyp" href="{{ route('checklist') }}" style="border-radius: 0; ">Administration</a>
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
    @yield('js')
</body>
</html>
