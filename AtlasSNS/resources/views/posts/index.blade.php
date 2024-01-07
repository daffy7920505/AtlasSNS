@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->
  <div>
    <form action="/post" method="post"><!--actionのURLをweb.phpに行く-->
      {{csrf_field()}}
      <textarea name="text" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="投稿">
    </form>
  </div>
@foreach($list as $list)
  <tr>
    <td>{{ $list->id }}</td>
    <td>{{ $list->post }}</td>
    <td>{{ $list->created_at }}</td>
    <td><a class="btn btn-primary" href="/post/{{$list->id}}/update">更新</a></td>
    <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除を削除します。よろしいでしょうか？')">削除</a></td>
  </tr>

    <div class="content">
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}">編集</a>
    </div>

@endforeach
  <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <form action="/post/update" method="post">
                <textarea name="up_post" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
          </form>
          <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

@endsection
