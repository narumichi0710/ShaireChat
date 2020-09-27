@extends('layouts.app')

@section('content')
<div class="container pt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h5 class="card-title">
                            カテゴリー : <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">
                                {{ $post->category->category_name }}
                            </a>
                        </h5>
                        <h5 class="card-title">
                            by <a href="{{ route('users.show', $post->user_id )}}">
                                {{ $post->user->name }}</a></h5>

                        <p class="card-text">{{ $post->content }}</p>
                        <img src="{{ asset('storage/image/'.$post->image) }}" alt="" style="width:100%; max-width:300px;">
                        <div class="row col-md pt-4">
                            @if($post->users()->where('user_id', Auth::id())->exists())
                            <a href="{{ route('posts.show', $post->id) }}" style="padding-left:5px;">
                                <input type="submit" value="&#xf164;いいねしました" class="fas btn btn-success" >
                            </a>
                            @else
                            <form method="POST" action="{{ route('favorites', $post)}}" style="padding-left:5px;">
                                @csrf
                                <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                            </form>

                            @endif

                        </div>
                    </div>
                </div>

                <div class="pt-3">
                    <h3 class="card-title">コメント一覧</h3>
                    @foreach($post->comments as $comment)
                    <div class="card m-2">
                        <div class="card-body">
                            <p class="card-text">{{ $comment->comment }}</p>
                            <p class="card-text">
                                by
                                <a href="{{ route('users.show', $comment->user->id )}}">
                                    {{ $comment->user->name }}
                                </a>
                                <small>投稿日：{{ date("Y-m-d H:i" ,strtotime($post->created_at)) }}</small>
                            </p>
                        </div>
                    </div>
                    @endforeach
                     
                    <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="fas btn btn-primary" style="margin:20px 0px;">コメントする</a>
                   
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection