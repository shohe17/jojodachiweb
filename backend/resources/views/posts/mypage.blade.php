@extends('layout', ['page' => 'mypage'])
@section('content')
<div class="container mt-5 pt-5" style="height:350px;">
  <div class="row">
    <div class="col-5">
      画像
    </div>
    <div class="col-3">
      {{ $user->name }}
    </div>
    <div class="col-3">
      設定ボタン
    </div>
    <div class="col-11">
      投稿数、フォロー数、フォロワー数
    </div>
    <div class="col-11">
      説明文
    </div>

  </div>

</div>
@include('posts.postList', ['page' => 'mypage'])
@endsection