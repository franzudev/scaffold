@extends('layouts.auth')

@section('auth')
<div class="col-md-8">
    <div class="card-group">
        <div class="card">
            <div class="card-body p-5">
                <div class="text-center">
                    <img src="images/logo.png" class="mb-5" width="150" alt="Modulr Logo">
                </div>
                <h1>{{ __('Accedi') }}</h1>
                <p class="text-muted">Accedi al tuo account</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-user"></i>
                            </span>
                        </div>
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}" required autofocus>

                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-lock"></i>
                            </span>
                        </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Ricordami') }}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary px4">
                                {{ __('Accedi') }}
                            </button>
                        </div>
                        <div class="col-8 text-right">
                            <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                {{ __('Password dimenticata?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer p-4 d-lg-none">
                <div class="col-12 text-right">
                    <a class="btn btn-outline-primary btn-block mt-3" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                </div>
            </div>
        </div>
{{--        TODO if needed registration uncomment --}}
        {{--<div class="card text-white bg-primary-light py-5 d-md-down-none">
            <div class="card-body text-center">
                <div>
                    <img src="images/logo.png" class="mb-5" width="150" alt="Modulr Logo">
                    <h2>{{ __('Registrati') }}</h2>
                    <p>Se non hai un account crealo ora</p>
                    <a class="btn btn-primary mt-2" href="{{ route('register') }}">{{ __('Registrati ora') }}</a>
                </div>
            </div>
        </div>--}}
    </div>
</div>
@endsection
