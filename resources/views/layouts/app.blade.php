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
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:white;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'Kalam', cursive; font-size:1.8em;">

                    {{ config('app.name', 'Shaire Chat') }}
                </a>
                
                <div class="collapse navbar-collapse">

                <div class="dropdown">
                    <a class="pl-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#a9a9a9;opacity:0.6;font-size:0.7em; ">
                       <i class="fas fa-search" style="font-size:1.5em; background-color:white;"> キーワードで探す</i>
                    </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <form method="get" action="{{ route('posts.search') }}" accept-charset="UTF-8" class="dropdown-item" class="form-inline my-2 my-md-0">
                        <span class="bmd-form-group">
                            <input name="search" value="" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" style="font-size:0.9em;  color:white; position:relative;">
                        </span>
                        <button class="btn btn-secondary btn-sm" style="background-color:#524e4d; border:none; opacity:0.3;" type="submit"><i class="fas fa-search" style="font-size:1.5em;"></i></button>
                        </form>
                        </div>
                    </div>
                    <div class="dropdown">
                <a class="pl-4" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" style="color:#a9a9a9;opacity:0.6;font-size:0.7em;background-color:white;border:none;" aria-expanded="false">
                <i class="fas fa-th" style="font-size:1.5em; background-color:white;"> カテゴリから探す</i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('product.index') }}">技術</a>
                    <a class="dropdown-item" href="/?category_id=2">悩み・相談</a>
                    <a class="dropdown-item" href="/?category_id=3">集客・経営</a>
                    <a class="dropdown-item" href="/?category_id=4">海外美容師</a>
                    <a class="dropdown-item" href="/?category_id=5">フリーランス</a>
                    <a class="dropdown-item" href="/?category_id=6">その他</a>
                </div>
                </div>
               

                    @if (Auth::check())
                    <ul class="navbar-nav ml-auto">
                        <li class="navber-item">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary mr-4 mt-2">
                              レビューを書く
                            </a>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary mr-4 mt-2">
                               コラムを投稿する
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                
                            @if(isset($post->user->thumbnail))

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
                    </ul>
                    @else
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item mr-2">
                            <a class="btn btn-outline-dark" href="{{ route('login') }}">ゲストユーザーログイン</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-dark" href="{{ route('login') }}">新規登録 / ログイン</a>
                        </li>  
                    
                    </ul>
                    @endif



                </div>
                
            </div>
        </nav>
       
        <main>
            <div class="container-fluid">

</div>

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
