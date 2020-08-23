@extends('layouts.app')
@section('title', 'No visit permission')

@section('content')
<div class="col-md-4 offset-md-4">
    <div class="card ">
        <div class="card-body">
            @if (Auth::check())
            <div class="alert alert-danger text-center mb-0">
                The logging account do not have administrator permission.
            </div>
            @else
            <div class="alert alert-danger text-center">
                Please operate after logging.
            </div>

            <a class="btn btn-lg btn-primary btn-block" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i>
                Login
            </a>
            @endif
        </div>
    </div>
</div>
@stop