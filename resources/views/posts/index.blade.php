@extends('layouts.app')

@section('content')

@if (Auth::check())
@else
<div class="jumbotron">
    <div class="container">

        <p class="lead">
            <span class="d-inline-block">
                SHAIRE CHATは美容師同士で技術や知識を共有したり、
                興味のあることや気になる事を質問できるコミュニティです。
            </span>
        </p>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header bg-light">レシピを記載しよう
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">自由に投稿</h5>
                        <p class="card-text">
                            質問や議論でもOK。気になること、書きたいことをどんどん投稿できます。
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <div class="card" style="height: 100%">
                    <div class="card-header bg-light">質問をしよう</div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                        </p>
                        <p class="card-text">

                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <div class="button-container">
                <login modal-id="login-modal-top" button-label="新規登録 / ログイン" large />
            </div>
        </div>

        <div class="text-center pt-4">
            <a href="{{ route('register') }}" class="btn btn-primary">
                新規登録 / ログイン</a>
        </div>

    </div>
</div>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-2 pt-5" style="padding:0;margin:0;">
            <div class="card-body">
                <h4>カテゴリ</h4>
                <div class="card">
                    <a href="/?category_id=1">技術</a>
                    <a href="/?category_id=2">悩み・相談</a>
                    <a href="/?category_id=3">集客・経営</a>
                    <a href="/?category_id=4">海外美容師</a>
                    <a href="/?category_id=5">フリーランス</a>
                    <a href="/?category_id=6">その他</a>
                </div>
            </div>
            <div class="card-body">
                <h4>話題のタグ</h4>

                <div class="card">


                </div>
            </div>

            <div class="card-body">
                <div class="card-title">
                    <h4>いいねが多い記事</h4>
                </div>

                <div class="card">
                    @foreach($posts as $post)
                    <a href="">{{ $post->id}}</a>
                    <a href="">{{ $post->user_id}}</a>
                    <a href="">{{ $post->post_id}}</a>
                    @endforeach

                    <a class="text-secondary" href="#"></a>
                </div>
            </div>


        </div>
        <div class="col-md-10 pt-4">
            <div class="card-body">
                <h3>最近の投稿</h3>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="container">
            <div class="row">
            @foreach($posts as $post)

                <div class="card col-md-4" style="width:100%; height:100%;">
                    <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                        <h5 class="card-title">
                            @if($post->user->thumbnail)
                            <a href="{{ route('users.show', $post->user_id) }}">
                                <img src="/storage/user/{{ $post->user->thumbnail }}" alt="" style="width:35px; height:35px; border-radius:50%; position:relative;
                            "></a>
                            @else
                            <a href="{{ route('users.show', $post->user_id) }}">
                                <img src="/storage/image/icon.jpg" style="width:40px; height:40px; border-radius:50%; position:relative;
                           "></a>
                            @endif

                            <a href="{{ route('users.show', $post->user_id) }}">{{ $post->user->name }}</a>

                            <small>
                                <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">
                                    <{{ $post->category->category_name }}>
                                </a>
                            </small>
                            <small>{{ date("Y-m-d H:i" ,strtotime($post->created_at)) }}</small>
                        </h5>


                        <small>
                            @foreach($post->tags as $tag)
                            <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name] )}}">
                                #{{ $tag->tag_name }}
                            </a>
                            @endforeach
                        </small>

                        <p class="card-text">{{ $post->content }}</p>

                        <div class="row col-md">
                            <a href="{{ route('posts.show', $post->id) }}" class="fas btn btn-primary">続きを見る</a>

                            @if($post->users()->where('user_id', Auth::id())->exists())
                            <a href="{{ route('posts.show', $post->id) }}" style="padding-left:5px;">
                                <input type="submit" value="&#xf164;いいねしました" class="fas btn btn-success">
                            </a>
                            @else
                            <form method="POST" action="{{ route('favorites', $post) }}" style="padding-left:5px;">
                                @csrf
                                <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                            </form>

                            @endif

                        </div>
                    </div>
                </div>


                @endforeach

            </div>
            </div>
            <div>

                @if(isset($category_id))
                {{ $posts->appends(['category_id' => $category_id])->links() }}

                @elseif(isset($tag_name))
                {{ $posts->appends(['tag_name' => $tag_name])->links() }}

                @elseif(isset($search_query))
                {{ $posts->appends(['search' => $search_query])->links() }}

                @else
                {{ $posts->links() }}
                @endif
            </div>




        </div>
    </div>
    </div>
    @endsection
