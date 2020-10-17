@extends('layouts.app')

@section('content')
<div class="container pt-4 mb-4 w-75">
    <div class="card">
        <div class="card-header text-center">{{ __('Login') }}</div>
        <div class="card-body w-75 m-auto">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group pt-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" style="font-size:1.2rem;" placeholder="{{ __('E-Mail Address') }}" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" style="font-size:1.2rem;" autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <div class="form-check text-center">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success" style="font-size:1.5rem;width:100%;">
                        {{ __('Login') }}
                    </button>
                    <div class="text-center">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>
            <div class="mb-2">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="hidden" name="password" value="guestpass">
                <input type="hidden" name="email" value="guest@guest.com" >
            <button type="submit" class="btn btn-outline-success" style="font-size:1.5rem;width:100%;">
                ゲストユーザーログイン
            </button>
            </form>
            </div>
            <div class="mb-2">
            <a href="{{ route('register') }}">
            <button type="submit" class="btn btn-outline-success" style="font-size:1.5rem;width:100%;">
                新規登録はこちら
            </button>
            </a>
            </div>

        </div>
    </div>
</div>
@endsection
