@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">記事作成</div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">タイトル</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="title">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">ファイルを選択する(任意)</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">カテゴリー</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    <option selected="">選択する</option>
                                    <option value="1">技術</option>
                                    <option value="2">悩み・相談</option>
                                    <option value="3">集客・経営</option>
                                    <option value="4">海外美容師</option>
                                    <option value="5">フリーランス</option>
                                    <option value="6">その他</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="comment">コメント:</label>
                                <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
                            </div>

                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                            <button type="submit" class="btn btn-primary">送信</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
