@extends('layouts.app')

@section('content')

<div class="container pt-2">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card-header" id="header">{{ $user->name }}の投稿</div>
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @foreach($user->posts as $post)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <h5 class="card-title">
                カテゴリー : <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">
                    {{ $post->category->category_name }}
                </a>
            </h5>

                <h5 class="card-title">
              <a href="{{ route('users.show', $post->user_id )}}">
                    {{ $post->user->name }}</a></h5>

            <p class="card-text">{{ $post->content }}</p>

        </div>
    </div>
    @endforeach
</div>
</div>
</div>
</div>

@endsection
