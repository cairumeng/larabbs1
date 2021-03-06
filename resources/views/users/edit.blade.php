@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8 offset-md-2">

        <div class="card">
            <div class="card-header">
                <h4>
                    <i class="glyphicon glyphicon-edit"></i> Edit Personal Info
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @include('shared._error')

                    <div class="form-group">
                        <label for="name-field">Name</label>
                        <input class="form-control" type="text" name="name" id="name-field"
                            value="{{ old('name', $user->name) }}" />
                    </div>
                    <div class="form-group">
                        <label for="email-field">Email</label>
                        <input class="form-control" type="text" name="email" id="email-field"
                            value="{{ old('email', $user->email) }}" disabled />
                    </div>
                    <div class="form-group">
                        <label for="introduction-field">Introduction</label>
                        <textarea name="introduction" id="introduction-field" class="form-control"
                            rows="3">{{ old('introduction', $user->introduction) }}</textarea>
                    </div>
                    <div class="from-group mb-4">
                        <label for="" class="avatar-label">Avatar</label>
                        <input type="file" name="avatar" class="form-control-file">
                        @if($user->avatar)
                        <br>
                        <img src="{{$user->avatar}}" alt="" class="thumbnail img-responsive" width="200">
                        @endif
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection