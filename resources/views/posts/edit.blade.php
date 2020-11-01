@extends('layouts.app')
@section('content')

<div class="container pt-4 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-right">
                        <div class="card-text"><small>投稿日：{{ date("Y-m-d H:i" ,strtotime($post->created_at)) }}</small>
                        </div>
                    </div>
                    <form action="{{ route('posts.update', ['post' => $post])}}" method="POST">
                        <div class="form-group col-md-12">
                            @csrf
                            @method('PUT')
                            <label for="title">タイトル</label>
                            <input type="text" class="form-control" id="title" value="{{ $post->title }}" name="title">
                        </div>
                        <div class="form-group col-md-12">
                            @if(isset($post->image))
                            <img src="{{ asset('storage/image/'.$post->image) }}" alt="" class="w-50">
                            @else
                            <img src="{{ asset('storage/image/noimage.jpg') }}" alt="" class="w-50">
                            @endif
                        </div>
                        <div class="form-group col-md-12">

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputFile" name="image" value="{{ old('image') }}" multiple>
                            <label class="custom-file-label" for="inputFile" data-browse="参照">ファイルを選択する</label>
                        </div>
                        <div class="input-group-append pt-2">
                            <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset">取消</button>
                        </div>
                         </div>
                        <div class="form-group col-md-12">
                            <label for="comment">本文</label>
                            <textarea class="form-control" rows="5" id="comment" name="content">{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            販売方法 :
                            @if(!empty($post->buy->buy_name))
                                {{ $post->buy->buy_name }}
                            @endif
                        </div>
                        <div class="form-group col-md-12">受け取り場所 :
                            @if(!empty($post->prefecture->prefecture_name))
                            {{ $post->prefecture->prefecture_name }}
                            @endif - {{ $post->address }}
                        </div>
                        <div class="form-group col-md-12">カテゴリー : {{ $post->category->category_name }}</div>
                        <div class="form-group col-md-12">価格 : {{ $post->price }}円</div>
                            <div class="form-group col-md-6 pt-3"> <input class="btn btn-success w-50" type="submit" value="変更する"></div>
                            <div class="form-group col-md-6 pt-3"><a href="{{ route('posts.show' , $post->id) }}" class="btn btn-primary">戻る</a></div>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    </form>
                </div>
            </div>
            <div class="card mt-3 p-3">
                <div class="card-body">
                    <div class="card-title">この投稿を削除する</div>
                <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">削除</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
