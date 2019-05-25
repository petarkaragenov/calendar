@extends('layouts.app')

@section('content')
<div class="is-fullheight has-background-grey-light">
    <div class="container inner-space">
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="card card--login has-background-grey-darker">
            <header class="card-header">
                <p class="card-header-title title card-header-title--center has-text-warning">
                    {{ __('Register') }}
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf 

                        <div class="field">
                            <label for="name" class="label label--light">{{ __('Name') }}</label>
                            <input type="text" class="input @error('name') is-danger @enderror" name="name" id="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="John Doe">
                            @error('name')
                                <small class="has-text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="email" class="label label--light">{{ __('Email Address') }}</label>
                            <input type="email" class="input @error('email') is-danger @enderror" name="email" id="email" value="{{ old('email') }}" autocomplete="email" placeholder="example@email.com">
                            @error('email')
                                <small class="has-text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="password" class="label label--light">{{ __('Password') }}</label>
                            <input type="password" class="input @error('password') is-danger @enderror" name="password" id="password" autocomplete="new-password">
                            @error('password')
                                <small class="has-text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="password-confirm" class="label label--light">{{ __('Confirm Password') }}</label>
                            <input type="password" class="input" name="password_confirmation" id="password-confirm" autocomplete="new-password">
                        </div>
                        <div class="field mt-2">
                            <button type="submit" class="button is-warning is-fullwidth">
                                {{ __('Register') }}
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
