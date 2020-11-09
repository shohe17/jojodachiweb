@extends('layout', ['page' => 'mypage'])
@section('content')
<div class="container mt-5 pt-5" style="width:1000px;">
  <div class="row" ">
    <div class="col-5">
      <img class="card-img-top post-img" src="{{ asset('storage/' . $user->image_at) }}" alt="Profile">
    </div>
    <div class="col-6">
        <h3>
          {{ $user->name }}
        </h3> 
        @if ($user->name === Auth::user()->name)
          <!-- 自分のユーザーページの場合設定ボタンが出る -->
          <a href="{{ route('user.edit', ['user_name' => $user->name]) }}" class="btn btn-primary btn-sm">プロフィール設定</a>
          @else
            <!-- 自分以外のユーザーページのときはフォローボタンがでる -->
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
          @endif
      <div>
        投稿 フォロー フォロワー
      </div>
      <div>
        <a href="#" class="col-2">
        {{ $user->posts->count() }}
        </a>
        <a href="#" class="col-2">
        {{ $user->follows->count() }}
        </a>
        <a href="#" class="col-2">
        {{ $user->followers->count() }}
        </a>
      </div>        
    </div>
    <div class="col-12">
    {{ $user->biography }}
    </div>
</div>
@include('posts.postList', ['page' => 'mypage'])
@endsection