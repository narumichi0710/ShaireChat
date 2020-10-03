@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="form-group pt-4">
                            <div class="col-md-6 offset-md-2" id="mannaka">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 offset-md-2" id="mannaka">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check" style="text-align:center;" id="mannakabotan">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 offset-md-3 pt-3" id="mannakabotan">
                                <button type="submit" class="btn btn-outline-success" style="font-size:1.5rem;width:100%;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        
                            <div class="col-md-8 offset-md-3 pb-2" style="text-align:center;" id="mannaka_a">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            
                        </div>
                       
                    </form>
                    <div class="col-md-8 offset-md-3 pt-2 pb-4" id="mannakabotan">
                            <a href="{{ route('register') }}">
                            <button type="submit" class="btn btn-outline-success" style="font-size:1.5rem;width:100%;" >
                                    新規登録はこちら
                                </button>
                                </a>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
