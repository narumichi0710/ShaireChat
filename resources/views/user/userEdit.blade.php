@extends('layouts.app')
@section('title','ユーザー情報変更')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    @if(!empty($authUser->thumbnail))
                    <div class="pt-2 pb-2">
                        <img src="/storage/user/{{ $authUser->thumbnail }}" alt="" style="width:150%; max-width:150px;">
                    </div>
                    @else
                    画像なし
                    @endif
                    <form method="post" action="{{ route('user.userUpdate') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <input type="file" name="thumbnail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input type="hidden" name="user_id" value="{{ $authUser->id }}">
                                @if($errors->has('user_id'))
                                <div class="error">{{ $errors->first('user_id') }}</div>
                                @endif
                                <input type="text" class="form-control" name="name" placeholder="User" value="{{ $authUser->name }}">
                                @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mt-4">

                            <div class="col-md-6">
                                <input type="submit" name="send" value="プロフィール変更" class="btn btn-primary btn-sm btn-done">
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">戻る</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>        
        @endsection