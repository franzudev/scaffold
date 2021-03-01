@extends('layouts.app')

@section('content')
<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container">
        <div class="card-body">
            @if(Auth::user()->hasRole('admin'))
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
