@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="card-title">{{ $post->title }}</h3>
                            @if(isset($post->image))
                            <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="w-100">
                            @else
                            <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="w-100">
                            @endif
                            <div class="card-text pt-3 pb-3">{{ $post->content }}</div>
                        </div>
                        <div class="col-lg-5">
                            <div class="card-title text-right w-100">
                                @if($post->users()->where('user_id', Auth::id())->exists())
                                <form method="POST" action="{{ route('unfavorites', $post)}}">
                                    @csrf
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        <input type="submit" value="&#xf004;お気に入り登録済み" class="btn btn-outline-dark fas fa-heart" id="unfavorite">
                                    </a>
                                </form>
                                @else
                                <form method="POST" action="{{ route('favorites', $post )}}" style="padding-left:5px;">
                                    @csrf
                                    <small><input type="submit" name="favorite_id" class="btn btn-outline-dark far fa-heart" value="&#xf004;お気に入り登録" id="favorite"></small>
                                </form>
                                @endif
                                <div class="card-text"><small>投稿日：{{ date("Y-m-d H:i" ,strtotime($post->created_at)) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <table class="profile-info">
                            <tr>
                                <td>価格 : </td>
                                <td class="profile-info-yen">{{ $post->price }}円</td>
                            </tr>
                            <tr>
                                <td>受け取り場所 : </td>
                                <td>@if(!empty($post->prefecture->prefecture_name))
                                    {{ $post->prefecture->prefecture_name }}
                                    @endif- {{ $post->address }}</td>
                            </tr>
                            <tr>
                                <td>販売方法 : </td>
                                <td>@if(!empty($post->buy->buy_name))<a href="{{ route('posts.index', ['buy_id' => $post->buy_id]) }}">{{ $post->buy->buy_name }}　@endif</a></td>
                            </tr>
                            <tr>
                                <td>カテゴリー : </td>
                                <td><a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">{{ $post->category->category_name }}　</a></td>
                            </tr>
                            <tr>
                                <td>投稿者 : </td>
                                <td><a href="{{ route('users.show', $post) }}">{{ $post->user->name }}</a></td>
                            </tr>
                        </table>
                        @if(!empty($post->user_id == $authUser->id))
                        <div class="card-text text-center"><a class="btn btn-success w-75 mt-4" href="{{ route('posts.edit', $post->id )}}">編集する</a></div>
                        @endif
                        <div class="card-text text-center pt-2"> <a class="btn btn-success w-75 mb-3" href="{{ route('comments.create', ['post_id' => $post->id]) }}">コメントする</a></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="pt-4">
                <h3 class="card-header pb-2" id="header">
                    {{ $post->comments->count() }}件のコメント
                </h3>
                @foreach($post->comments as $comment)
                <div class="card m-2">
                    <div class="card-body">
                        <a href="{{ route('users.show', $comment->user->id )}}">
                            {{ $comment->user->name }}
                        </a>さん
                        <p class="card-text">{{ $comment->comment }}</p>
                        <p class="car-text">
                            <small>{{ date("Y-m-d H:i" ,strtotime($post->created_at)) }}</small>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection