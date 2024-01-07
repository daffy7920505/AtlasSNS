@extends('layouts.login')

@section('content')
<p>Follower List</p>

@foreach($users as $users)
  <img src="{{ asset('/storage/'.$users->images) }}">

  @endforeach

@endsection
