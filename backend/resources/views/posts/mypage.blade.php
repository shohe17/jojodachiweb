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
      @if (auth()->user()->isFollowing($user->id))
        <form method="post" action="{{ route ('posts.unfollow', ['id' => $user->id]) }}">
          @csrf
          <button class="btn btn-primary btn-sm" type="submit" value="フォロー">フォロー解除</button>
        </form>
      @else
        <form method="post" action="{{ route ('posts.follow', ['id' => $user->id]) }}">
          @csrf
          <button class="btn btn-primary btn-sm" type="submit" value="フォロー">フォローする</button>
        </form>  
      @endif     
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