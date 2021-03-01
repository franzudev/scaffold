@extends('layouts.auth')

@section('auth')
<div class="col-md-6 mt-4">
    <div class="card mx-4">
        <div class="card-header">
            <div class="brand-card-header">
                @env('local')
                    <a href="{{ route('homepage') }}">
                        <img src="{{ asset('images/Logo.png') }}" alt="">
                    </a>
                @endenv
                @env('production')
                    <a href="{{ route('homepage') }}">
                        <img src="{{ secure_asset('images/Logo.png') }}" alt="">
                    </a>
                @endenv
            </div>
        </div>
        <div class="card-body p-4">
            <h1>{{ __('Registrazione') }}</h1>
            <p class="text-muted">Crea il tuo account</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="roles[name]" value="user">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-calendar"></i>
                        </span>
                    </div>
                    <input id="birth_date" type="date" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" value="{{ old('birth_date') }}"  placeholder="{{ __('Data di Nascita') }}" required autofocus>

                    @if ($errors->has('birth_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birth_date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-user"></i>
                        </span>
                    </div>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}"  placeholder="{{ __('Username') }}" required autofocus>

                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-user"></i>
                        </span>
                    </div>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  placeholder="{{ __('Nome') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-user"></i>
                        </span>
                    </div>
                    <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}"  placeholder="{{ __('Cognome') }}" required autofocus>

                    @if ($errors->has('surname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-phone"></i>
                        </span>
                    </div>
                    <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}"  placeholder="{{ __('Telefono') }}" required autofocus>

                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-home"></i>
                        </span>
                    </div>
                    <input id="residence" type="text" class="form-control{{ $errors->has('residence') ? ' is-invalid' : '' }}" name="residence" value="{{ old('residence') }}"  placeholder="{{ __('Residenza') }}" required autofocus>

                    @if ($errors->has('residence'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('residence') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-lock"></i>
                        </span>
                    </div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="{{ __('Password') }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-lock"></i>
                        </span>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Conferma Password') }}" required>
                </div>
                <button type="submit" class="btn btn-block btn-success btn-primary">
                    {{ __('Crea Account') }}
                </button>
            </form>
        </div>
        <div class="card-footer p-4">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-outline-primary btn-block" href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
