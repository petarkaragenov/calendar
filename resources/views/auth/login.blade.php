@extends('layouts.app')

@section('content')
<div class="is-fullheight has-background-grey-light">
    <div class="container inner-space">
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="card card--login has-background-grey-darker">
            <header class="card-header">
                <p class="card-header-title card-header-title--center">
                    <i class="fas fa-user fa-7x has-text-warning inner-space"></i>  
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf 

                        <div class="field">
                            <label for="email" class="label label--light">{{ __('E-Mail Address') }}</label>
                            <input type="text" class="input @error('email') is-danger @enderror" name="email" id="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="example@email.com">
                            @error('email')
                                <small class="has-text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="email" class="label label--light">{{ __('Password') }}</label>
                            <input type="password" class="input @error('password') is-danger @enderror" name="password" id="password" value="{{ old('password') }}" autocomplete="current-password">
                            @error('password')
                                <small class="has-text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="field">
                            <div class="tile tile-ancestor">
                                <div class="tile is-10">
                                    <label for="remember" class="label label--light">
                                        <input type="checkbox" class="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="tile is-2">
                                    <small class="is-pulled-right">
                                        <a href="{{ route('register') }}">Register</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <button type="submit" class="button is-warning is-fullwidth">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="back-control">
            <a href="{{ url('/') }}" class="link"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection
