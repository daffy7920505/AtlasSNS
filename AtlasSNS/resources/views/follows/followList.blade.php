@extends('layouts.login')

@section('content')
<p>Follow List</p>

@foreach($users as $users)
  <img src="{{ asset('/storage/'.$users->images) }}">
  <p>{{ $posts->count() }}</p>
  <p>{{ $posts->post }}</p>
@endforeach

@endsection
