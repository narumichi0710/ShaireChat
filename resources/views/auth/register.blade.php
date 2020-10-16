@extends('layouts.app')

@section('content')
<div class="container pt-4 w-75">
    <div class="card">
        <div class="card-header text-center">{{ __('Register') }}</div>
        <div class="card-body w-75 m-auto">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group pt-4">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}"  style="font-size:1.2rem;" autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  style="font-size:1.2rem;" placeholder="{{ __('email') }}" autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" style="font-size:1.2rem;" placeholder="{{ __('Password') }}" autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" style="font-size:1.2rem;" autocomplete="new-password">
                </div>

                <div class="form-group pt-4 pb-2">
                    <button type="submit" class="btn btn-outline-success" style="font-size:1.5rem;width:100%;">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection