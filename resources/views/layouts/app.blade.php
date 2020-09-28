<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shaire Chat') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cuprum&family=Kalam:wght@300&family=Noto+Sans:ital@0;1&display=swap" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/693565a5da.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #524e4d;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'Kalam', cursive; font-size:1.8em;">

                    {{ config('app.name', 'Shaire Chat') }}
                </a>

                @if (Auth::check())
                <div class="collapse navbar-collapse" >
                <ul class="navbar-nav mr-auto">
                        <form method="get" action="{{ route('posts.search') }}" accept-charset="UTF-8" class="form-inline my-2 my-md-0">

                            <span class="bmd-form-group">
                                <input name="search" value="" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" style="font-size:0.9em; background-color: #524e4d; border:none; border-bottom:1px solid #383c3c; color:white; position:relative; left:10px; ">
                            </span>
                            <button class="btn btn-secondary btn-sm" style="background-color:#524e4d; border:none; opacity:0.3;" type="submit"><i class="fas fa-search" style="font-size:1.5em; background-color:#524e4d;"></i></input>
                        </form>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="navber-item">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary"
                            >
                                投稿を新規作成する
                            </a>
                        </li>
                    </ul>
                @else
                @endif

                    <ul class="navbar-nav ml-3">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>

                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(!empty($post->user->thumbnail))
                                <img src="/storage/user/{{ $post->user->thumbnail }}" alt="" style="width:40px; height:40px; border-radius:50%; position:relative;
                            ">
                            @else

                                <img src="/storage/image/icon.jpg" style="width:40px; height:40px; border-radius:50%; position:relative;
                           ">
                            @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.index') }}">設定</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
                @isset($search_result)
                <h5 class="card-title">{{ $search_result }}</h5>
                @endisset
                <div>
                @yield('content')
                </div>
        </main>
    </div>

</body>

</html>
