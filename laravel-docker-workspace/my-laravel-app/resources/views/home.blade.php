@extends('layouts.app')

@section('content')
<h1 class="text-center">画像投稿掲示板</h1>

<!-- エラーメッセージ 
@if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif -->

<!-- 直前投稿 -->
@isset($db_tests)
@foreach ($db_tests as $d)
    <h2>{{ $d->name }}さんの投稿</h2>
    <img  style="max-width : 100%" src="data:image/png;base64,<?=  $d->image  ?>"> <br>
    <h4>{{ $d->comment }}</h4>
    <br><hr>
@endforeach
@endisset

<form method="post" action="/home" enctype="multipart/form-data">
@csrf
        名前：<br>
        <input type="text" name="name" class="btn-default btn"><br><br>
        <span  style="color : red" class="help-block">{{$errors->first('name')}}</span>

        画像：<br>
        <input class="btn btn-default" type="file" name="image"><br><br>
        <span style="color : red" class="help-block">{{$errors->first('image')}}</span>

        コメント：<br>
        <textarea name="comment" rows="4" cols="40" class="btn btn-default"></textarea>
        <br>        
        <span style="color : red" class="help-block">{{$errors->first('comment')}}</span>
    <input type="submit" class="btn btn-success">


</form>
@endsection