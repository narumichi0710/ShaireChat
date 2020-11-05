<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shaire Chat v1.0') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cuprum&family=Kalam:wght@300&family=Noto+Sans:ital@0;1&display=swap" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/693565a5da.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color:white;">
    <div id="app">
        <nav class="navbar navbar-expand-xl navbar-light shadow-sm" id="nav" style="background-color:white;">
            <div class="container-fluid mr-2 ml-2" style="margin-top:0;">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'Kalam', cursive; font-size:1.7em;">
                    {{ config('app.name', 'Shaire Chat') }}
                </a>
                <ul class="navbar-nav mr-auto pl-3 pb-3">
                    <li class="navber-title pt-3">使わなくなったサロン道具をシェアできるコミュニティ</li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" style="border:none;">
                    @if(!empty($authUser->thumbnail))
                    <img src="/storage/user/{{ $authUser->thumbnail }}" alt="" style="width:40px; height:40px; border-radius:50%; position:relative;">
                    @elseif(Auth::check())
                    <img src="/storage/image/icon.jpg" style="width:40px; height:40px; border-radius:50%; position:relative;">
                    @else
                    <span class="navbar-toggler-icon"></span>
                    @endif
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto">
                        </li>
                        @if(auth::check())
                        <li class="nav-item active pt-2" id="navber-item">
                            <div class="dropdown">
                                <a class="pl-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#a9a9a9;opacity:0.6;font-size:0.7em;;">
                                    <i class="fas fa-search" style="font-size:1.3em; background-color:white;"> キーワードで探す</i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <form method="get" action="{{ route('posts.search') }}" accept-charset="UTF-8" class="dropdown-item" class="form-inline my-2 my-md-0">
                                        <span class="form-group">
                                            <input name="search" value="" type="text" class="form-control" type="text">
                                            <button type="submit" style="border:none;background-color:white;"><i class="fas fa-search" style="opacity:0.3;position:absolute;display:flex;right:33px;top:22px;"></i></button>
                                            <input name="prefecture_id" style="display:none;">
                                            <select name="category_id" style="display:none;">
                                                <option value="" style="display:none;"></option>
                                            </select>
                                            <select name="buy_id" style="display:none;">
                                                <option value="" style="display:none;"></option>
                                            </select>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item mr-5 pt-2" id="navber-item">
                            <div class="dropdown">
                                <a class="pl-4" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" style="color:#a9a9a9;opacity:0.6;font-size:0.7em;background-color:white;border:none;" aria-expanded="false">
                                    <i class="fas fa-th" style="font-size:1.3em; background-color:white;"> カテゴリから探す</i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="/?category_id=1">カラー剤</a>
                                    <a class="dropdown-item" href="/?category_id=2"> パーマ剤</a>
                                    <a class="dropdown-item" href="/?category_id=3">カットウィッグ</a>
                                    <a class="dropdown-item" href="/?category_id=4"> ヘアケア</a>
                                    <a class="dropdown-item" href="/?category_id=5"> バリカン/トリマー</a>
                                    <a class="dropdown-item" href="/?category_id=6"> ヘアエクステ/ウィッグ</a>
                                    <a class="dropdown-item" href="/?category_id=7"> シザース/レザー</a>
                                    <a class="dropdown-item" href="/?category_id=8"> ドライヤー</a>
                                    <a class="dropdown-item" href="/?category_id=9"> コーム/ブラシ</a>
                                    <a class="dropdown-item" href="/?category_id=10="> 理美容品/小物</a>
                                    <a class="dropdown-item" href="/?category_id=11="> セット椅子</a>
                                    <a class="dropdown-item" href="/?category_id=12="> スタイリングチェア</a>
                                    <a class="dropdown-item" href="/?category_id=13="> シャンプーチェア</a>
                                    <a class="dropdown-item" href="/?category_id=14="> シャンプー台</a>
                                    <a class="dropdown-item" href="/?category_id=15="> シャンプー関連機器</a>
                                    <a class="dropdown-item" href="/?category_id=16="> セット面/ミラー</a>
                                    <a class="dropdown-item" href="/?category_id=17="> バーバー椅子</a>
                                    <a class="dropdown-item" href="/?category_id=18="> 理容室関連機器</a>
                                    <a class="dropdown-item" href="/?category_id=19="> サインポール</a>
                                    <a class="dropdown-item" href="/?category_id=20="> 促進器/スチーマー</a>
                                    <a class="dropdown-item" href="/?category_id=21="> スツール/ワゴン</a>
                                    <a class="dropdown-item" href="/?category_id=22="> タオルウォーマー</a>
                                    <a class="dropdown-item" href="/?category_id=23="> 消毒器</a>
                                    <a class="dropdown-item" href="/?category_id=24="> サロン家具</a>
                                    <a class="dropdown-item" href="/?category_id=25="> サロンインテリア</a>
                                    <a class="dropdown-item" href="/?category_id=26="> 本/参考書</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item" id="navber-item">
                            <a href="{{ route('posts.create') }}" class="btn btn-light mr-4">投稿する</a>
                        </li>
                        <li class="nav-item p-2 mt-5" id="navber-responsive">
                            <a class="btn btn-light mt-2" href="{{ route('posts.create') }}">投稿する</a>
                        </li>
                        <li class="nav-item p-2" id="navber-responsive-auth">
                            <a class="btn btn-light mt-2" href="{{ route('users.profile') }}">マイページ</a>
                        </li>
                        <li class="nav-item p-2" id="navber-responsive-auth">
                            <a class="btn btn-light mt-2" href="{{ route('users.index') }}">設定</a>
                        </li>
                        <li class="nav-item p-2 pb-4" id="navber-responsive-auth">
                            <a class="btn btn-light mt-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @else
                        <li class="nav-item" id="navber-responsive-log">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <input type="hidden" name="password" value="guestpass">
                                <input type="hidden" name="email" value="guest@guest.com">
                                <button type="submit" class="btn btn-light mr-4 mt-2">
                                    ゲストユーザーログイン
                                </button>
                            </form>
                        </li>
                        <li class="nav-item" id="navber-responsive-reg">
                            <a class="btn btn-light mr-4 mt-2" href="{{ route('login') }}">新規登録 / ログイン</a>
                        </li>
                        @endif
                    </ul>
                    @if(auth::check())
                    <div class="dropdown ml-0" id="navber-item">
                        <a href="#" id="dropdown-menu" class="dropdown" data-toggle="dropdown" role="button" 　aria-haspopup="true" aria-expanded="false">
                            @if(!empty($authUser->thumbnail))
                            <img src="/storage/user/{{ $authUser->thumbnail }}" alt="" style="width:40px; height:40px; border-radius:50%;">
                            @else
                            <img src="/storage/image/icon.jpg" style="width:40px; height:40px; border-radius:50%;">
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item pt-2" href="{{ route('users.profile') }}">マイページ</a>
                            <a class="dropdown-item pt-2" href="{{ route('users.index') }}">設定</a>
                            <a class="dropdown-item pt-2 pb-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="footer-title">カテゴリ</p>
                        <ul class="footer-item">
                            <li><a href="/?category_id=1">カラー剤</a></li>
                            <li><a href="/?category_id=2"> パーマ剤</a></li>
                            <li><a href="/?category_id=3">カットウィッグ</a></li>
                            <li><a href="/?category_id=4"> ヘアケア</a></li>
                            <li><a href="/?category_id=5"> バリカン/トリマー</a></li>
                            <li><a href="/?category_id=6"> ヘアエクステ/ウィッグ</a></li>
                            <li><a href="/?category_id=7"> シザース/レザー</a></li>
                            <li><a href="/?category_id=8"> ドライヤー</a></li>
                            <li><a href="/?category_id=9"> コーム/ブラシ</a></li>
                            <li><a href="/?category_id=10="> 理美容品/小物</a></li>
                            <li><a href="/?category_id=11="> セット椅子</a></li>
                            <li><a href="/?category_id=12="> スタイリングチェア</a></li>
                            <li><a href="/?category_id=13="> シャンプーチェア</a></li>
                            <li><a href="/?category_id=14="> シャンプー台</a></li>
                            <li><a href="/?category_id=15="> シャンプー関連機器</a></li>
                            <li><a href="/?category_id=16="> セット面/ミラー</a></li>
                            <li><a href="/?category_id=17="> バーバー椅子</a></li>
                            <li><a href="/?category_id=18="> 理容室関連機器</a></li>
                            <li><a href="/?category_id=19="> サインポール</a></li>
                            <li><a href="/?category_id=20="> 促進器/スチーマー</a></li>
                            <li><a href="/?category_id=21="> スツール/ワゴン</a></li>
                            <li><a href="/?category_id=22="> タオルウォーマー</a></li>
                            <li><a href="/?category_id=23="> 消毒器</a></li>
                            <li><a href="/?category_id=24="> サロン家具</a></li>
                            <li><a href="/?category_id=25="> サロンインテリア</a></li>
                            <li><a href="/?category_id=26="> 本/参考書</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p class="footer-title">エリア</p>
                        <ul class="footer-item">
                            <li><a href="/?prefecture_id=1"> 北海道</a></li>
                            <li><a href="/?prefecture_id=2"> 青森県</a></li>
                            <li><a href="/?prefecture_id=3"> 岩手県</a></li>
                            <li><a href="/?prefecture_id=4"> 宮城県</a></li>
                            <li><a href="/?prefecture_id=5"> 秋田県</a></li>
                            <li><a href="/?prefecture_id=6"> 山形県</a></li>
                            <li><a href="/?prefecture_id=7"> 福島県</a></li>
                            <li><a href="/?prefecture_id=8"> 茨城県</a></li>
                            <li><a href="/?prefecture_id=9"> 栃木県</a></li>
                            <li><a href="/?prefecture_id=10"> 群馬県</a></li>
                            <li><a href="/?prefecture_id=11"> 埼玉県</a></li>
                            <li><a href="/?prefecture_id=12"> 千葉県</a></li>
                            <li><a href="/?prefecture_id=13"> 東京都</a></li>
                            <li><a href="/?prefecture_id=14"> 神奈川県</a></li>
                            <li><a href="/?prefecture_id=15"> 新潟県</a></li>
                            <li><a href="/?prefecture_id=16"> 富山県</a></li>
                            <li><a href="/?prefecture_id=17"> 石川県</a></li>
                            <li><a href="/?prefecture_id=18"> 福井県</a></li>
                            <li><a href="/?prefecture_id=19"> 山梨県</a></li>
                            <li><a href="/?prefecture_id=20"> 長野県</a></li>
                            <li><a href="/?prefecture_id=21"> 岐阜県</a></li>
                            <li><a href="/?prefecture_id=22"> 静岡県</a></li>
                            <li><a href="/?prefecture_id=23"> 愛知県</a></li>
                            <li><a href="/?prefecture_id=24"> 三重県</a></li>
                            <li><a href="/?prefecture_id=25"> 滋賀県</a></li>
                            <li><a href="/?prefecture_id=26"> 京都府</a></li>
                            <li><a href="/?prefecture_id=27"> 大阪府</a></li>
                            <li><a href="/?prefecture_id=28"> 兵庫県</a></li>
                            <li><a href="/?prefecture_id=29"> 奈良県</a></li>
                            <li><a href="/?prefecture_id=30"> 和歌山県</a></li>
                            <li><a href="/?prefecture_id=31"> 鳥取県</a></li>
                            <li><a href="/?prefecture_id=32"> 島根県</a></li>
                            <li><a href="/?prefecture_id=33"> 岡山県</a></li>
                            <li><a href="/?prefecture_id=34"> 広島県</a></li>
                            <li><a href="/?prefecture_id=35"> 山口県</a></li>
                            <li><a href="/?prefecture_id=36"> 徳島県</a></li>
                            <li><a href="/?prefecture_id=37"> 香川県</a></li>
                            <li><a href="/?prefecture_id=38"> 愛媛県</a></li>
                            <li><a href="/?prefecture_id=39"> 高知県</a></li>
                            <li><a href="/?prefecture_id=40"> 福岡県</a></li>
                            <li><a href="/?prefecture_id=41"> 佐賀県</a></li>
                            <li><a href="/?prefecture_id=42"> 長崎県</a></li>
                            <li><a href="/?prefecture_id=43"> 熊本県</a></li>
                            <li><a href="/?prefecture_id=44"> 大分県</a></li>
                            <li><a href="/?prefecture_id=45"> 宮崎県</a></li>
                            <li><a href="/?prefecture_id=46"> 鹿児島県</a></li>
                            <li><a href="/?prefecture_id=47"> 沖縄県</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src=" {{ mix('js/app.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

</body>


</html>