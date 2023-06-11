@extends('layouts.login')

@section('content')
<p>フォローリスト</p>
<form action="{{ route('file_images') }}" enctype='multipart/form-data' method="post">
<input type="file" name="image">
</form>
@endsection
