<!--検索関連 -->
@extends('layouts.login')

@section('content')
<!-- ユーザー検索 -->
<form class="form-inline" action="{{url('/search')}}" method="POST">
  <div class="form-group">
    <input type="text" name="keyword"placeholder="ユーザー名">
    <input type="submit" value="検索" >
  </div>
  {{csrf_field()}}
</form>

@foreach($users as $users)
<div>
  <tr>
    <td>{{ $users->username }}</td>
    <td>{{ $users->post }}</td>
    <td>{{ $users->created_at }}</td>
    @if (auth()->user()->isFollowing($users->id))
    <td><a class="btn btn-primary" href="/follow-delete/{{$users->id}}">フォロー解除</a></td>
    @else
    {{ csrf_field() }}
    <td><a class="btn btn-primary" href="/follow-create/{{$users->id}}">フォローする</a></td>
    @endif
  </tr>
</div>
@endforeach

@if(isset($keyword))
<div>
{{ $keyword }}
</div>
@endif


@endsection
