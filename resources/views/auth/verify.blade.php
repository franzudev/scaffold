@extends('layouts.auth')

@section('auth')
<style>
form input[type="submit"]{
    background: none;
    border: none;
    color: blue;
    text-decoration: underline;
    cursor: pointer;
    }
</style>
<div class="col-md-6">
    <div class="card mx-4">
        <div class="card-body p-4">
            <h1>{{ __('Verifica il tuo indirizzo email') }}</h1>
            <p class="text-muted">{{ __('Prima di procedere, dovresti verificare il tuo indirizzo email') }}</p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
            {{ __('Se non hai ricevuto l\'email') }},<input style="background: none;border: none;color: #16bee3;text-decoration: underline;cursor: pointer;" type="submit" value="{{ __('clicca qui per riceverne un\'altra') }}">
            </form>

            @if (session('status'))
                <div class="alert alert-success mt-4" role="alert">
                    {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo email.') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
