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
                    <div class="card-header">{{ __('Mail Address Change') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.userUpdateEmail') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('Mail') }}</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="email" value="{{ $authUser->email }}">
                                    <input type="text" class="form-control" name="email" placeholder="変更するメールアドレス" value="{{ $authUser->email }}">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-6">

                                    <input type="submit" name="send" value="プロフィール変更" class="btn btn-primary btn-sm btn-done">
                                    <a href="#" class="btn btn-primary btn-sm">戻る</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection
