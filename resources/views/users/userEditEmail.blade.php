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
                <div class="card-header">{{ __('Mail Address Change') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('user.userUpdateEmail') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('Mail') }}</label>
                            <div class="col-md-6">
                            <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ $authUser->id }}">
                                @if($errors->has('user_id'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('user_id') }}</strong></span>
                                @endif
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="変更するメールアドレス" value="{{ $authUser->email }}">
                                @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-6">

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
@endsection
