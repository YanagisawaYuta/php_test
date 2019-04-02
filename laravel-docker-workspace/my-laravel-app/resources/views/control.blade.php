@extends('layouts.app')
@section('content')
  <h1 class="text-center">管理者ページ</h1>

  <!-- エラーメッセージエリア -->
@if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!-- 直前投稿エリア -->
@isset($db_tests)
@foreach ($db_tests as $d)
    <h2>{{ $d->name }}さんの投稿</h2>
    <img style="max-width : 100%" src="data:image/png;base64,<?=  $d->image  ?>"> <br>
    {{ $d->comment }}
    <form method="post" action="/control/delete/{{ $d->id }}">
        @csrf
        <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
    </form>
    <br><hr>
@endforeach
@endisset

@endsection