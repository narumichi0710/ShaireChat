@extends('layouts.app')
@section('content')

<div class="container">
    @if(isset($search_result))
    <h5 class="card-title">{{ $search_result }}</h5>
    @endif　　　　　　　
    <div class="gallery-category">
        @foreach($posts as $post)
        <div class="gallery-category-item">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card-body">
                        @if(isset($post->image))
                        <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="gallery-image">
                        @else
                        <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="gallery-image">
                        @endif
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <h6 class="card-title">{{ $post->title }}</h6>
                        </a>
                        <div class="card-title">価格 : {{ $post->price }} 円</div>
                        <div class="card-title">取引場所 : @if(!empty($post->prefecture->prefecture_name))
                            <a href="{{ route('posts.index', ['prefecture_id' => $post->prefecture_id]) }}">{{ $post->prefecture->prefecture_name }} - {{ $post->address }} </a>
                            @endif
                        </div>
                        <div class="card-title">販売方法 :@if(!empty($post->buy->buy_name))
                            <a href="{{ route('posts.index', ['buy_id' => $post->buy_id]) }}">{{ $post->buy->buy_name }}　</a>
                            @endif
                        </div>
                        <div class="card-title">
                            カテゴリー :
                            <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">
                                {{ $post->category->category_name }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex">
                    <div class="card-body">
                        @if(auth::check())
                        @if($post->users()->where('user_id', Auth::id())->exists())
                        <form method="POST" action="{{ route('unfavorites', $post)}}" class="text-right">
                            @csrf
                            <a href="">
                                <input type="submit" value="&#xf004;お気に入り登録済み" class="btn btn-outline-dark fas fa-heart" id="unfavorite">
                            </a>
                        </form>
                        @else
                        <form method="POST" action="{{ route('favorites', $post )}}" class="text-right">
                            @csrf
                            <input type="submit" name="favorite_id" class="btn btn-outline-dark far fa-heart" value="&#xf004;お気に入り登録" id="favorite">
                        </form>
                        @endif

                        @endif
                        <div class="card-title text-right">

                            <small>投稿日：{{ date("Y-m-d H:i" ,strtotime($post->created_at)) }}</small><br>
                            <small> {{ $post->comments->count() }}件のコメント</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-right mt-3">
        @if(isset($category_id))
        {{ $posts->appends(['category_id' => $category_id])->links() }}

        @elseif(isset($prefecture_id))
        {{ $posts->appends(['prefecture_id' => $prefecture_id])->links() }}

        @elseif(isset($buy_id))
        {{ $posts->appends(['buy_id' => $buy_id])->links() }}

        @elseif(isset($search_query))
        {{ $posts->appends(['search' => $search_query])->links() }}
        @else
        {{ $posts->links() }}
        @endif
    </div>
</div>
@endsection