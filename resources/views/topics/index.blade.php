@extends('layouts.app')

@section('title','Topics')

@section('content')

<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    <div class="card">
      <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a href="#" class="nav-link active">Last reply</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Last post</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        @include('topics._topic_list',['topics'=>$topics])
        <div class="mt-5">
          {!! $topics->appends(Request::except('page'))->render()!!}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-3 sidebar">
    @include('topics._sidebar')
  </div>
</div>
@endsection