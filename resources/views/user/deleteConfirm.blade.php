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
                <div class="card-header">アカウント削除</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.delete')}}">
                        @csrf
                        <div class="text-center pt-4 pb-4">
                        <h5 class="pb-5">本当に削除しますか？</h5>
                        <button class="btn btn-danger btn-sm text-center pl-2 pr-2">削除する</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
