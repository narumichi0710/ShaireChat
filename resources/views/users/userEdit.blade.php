@extends('layouts.app')
@section('title','ユーザー情報変更')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pt-2 pb-4">
                            @if(!empty($authUser->thumbnail))
                                <img src="/storage/user/{{ $authUser->thumbnail }}" alt="" style="width:100%; max-width:150px;">
                            @else
                                <img src="/storage/image/icon.jpg" style="width:100%; max-width:150px;">
                            @endif
                                <small>現在のプロフィール画像</small>

                            </div>


                        </div>
                        <div class="col-md-8">
                            <form method="post" action="{{ route('user.userUpdate') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label text-md-right">ファイルを選択する</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputFile" name="thumbnail" multiple>
                                        <label class="custom-file-label" for="inputFile" data-browse="参照"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <div>
                                        <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ $authUser->id }}">
                                        @if($errors->has('user_id'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('user_id') }}</strong></span>
                                        @endif
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="変更するお名前" value="{{ $authUser->name}}">
                                        @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="profile" class=" col-form-label text-md-right">自己紹介</label>
                                        <div>
                                            <textarea type="text" class="form-control @error('profile') is-invalid @enderror" style="height:8em;" name="profile">{{ ($authUser->profile) }}</textarea>
                                            @if($errors->has('profile'))
                                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('profile') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 mt-4 mb-2">
                                    <div>
                                        <input type="submit" name="send" value="プロフィール変更" class="btn btn-success btn-sm btn-done">
                                        <a href="{{ route('users.index') }}" class="btn btn-success btn-sm">戻る</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
