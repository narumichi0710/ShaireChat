@extends('layouts.app')
@section('title','プロフィール')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body m-auto">
                    <div class="card-title mt-4">
                        @if(!empty($authUser->thumbnail))
                        <img src="/storage/user/{{ $authUser->thumbnail }}" alt="" class="m-auto" style="width:100%; max-width:200px;">
                        @else
                        <img src="/storage/image/icon.jpg" style="width:100%; max-width:200px;">
                        @endif
                    </div>

                    <label class="mt-3 mb-0">お名前</label>
                    <div class="card-text">{{ $authUser->name }}</div>
                    <label class="mt-3">自己紹介</lavel>
                        <div class="card-text">{{ $authUser->profile }}</div>
                        <a href="{{ route('user.userEdit')}}">
                        </a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="col-md-12 mt-3">
                <div class="card-header" id="header">
                    {{$authUser->name}}さんの投稿
                </div>
                @foreach($authUser->posts as $post)

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('posts.show', $post->id )}}">
                            <h5 class="card-title">{{ $post->title }}</h5>
                        </a>
                        <div class="card-text text-right"><small>投稿日：{{ date("Y-m-d H:i" ,strtotime($post->created_at)) }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
