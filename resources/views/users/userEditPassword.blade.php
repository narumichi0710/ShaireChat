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
                <div class="card-header">{{ __('Password Change') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('user.userUpdatePassword') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row pt-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="current_password" placeholder="現在のパスワード" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ $authUser->id }}">
                                @if($errors->has('user_id'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('user_id') }}</strong></span>
                                @endif
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="変更するパスワード" value="">
                                @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mt-4 ">
                            <div class="col-md-6">

                                <input type="submit" name="send" value="パスワード変更" class="btn btn-primary btn-sm btn-done">
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
