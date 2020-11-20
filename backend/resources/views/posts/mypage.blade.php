@extends('layout', ['page' => 'mypage'])
@section('content')
<div class="container mt-5 pt-5 bg-img1" style="width:1000px;">
  <div class="row">
    <div class="col-4">
      <h2>
        {{ $user->name }}
      </h2> 
      <img class="card-img-top post-img rounded-circle" src="{{ asset('storage/' . $user->image_at) }}" alt="Profile">
    </div>
    <div class="col-6 ml-5">
      @if ($user->name === Auth::user()->name)
        <!-- 自分のユーザーページの場合設定ボタンが出る -->
        <a href="{{ route('user.edit', ['user_name' => $user->name]) }}" class="btn btn-primary btn mb-5">プロフィール設定</a>
        @else
          <!-- 別ユーザーページのときはフォローボタン -->
          <!-- 確認 -->
          @if (auth()->user()->isFollowing($user->id))
            <form method="post" action="{{ route ('posts.unfollow', ['id' => $user->id]) }}">
              @csrf
              <button class="btn btn-primary btn mb-5" type="submit" value="フォロー">フォロー解除</button>
            </form>
          @else
            <form method="post" action="{{ route ('posts.follow', ['id' => $user->id]) }}">
              @csrf
              <button class="btn btn-primary btn mb-5" type="submit" value="フォロー">フォローする</button>
            </form>  
          @endif
        @endif
      <div class="ml-2 h4">
        <span>投稿</span>
        <span class="ml-2">フォロー</span>
        <span class="ml-2">フォロワー</span>
      </div>
      <div class="pl-1 h3 mb-5">
        <a href="#" class="col-1">
        {{ $user->posts->count() }}
        </a>
        <!-- followes, followersはuserモデルで定義しているメソッド -->
        <a href="#" class="col-2">
        {{ $user->follows->count() }}
        </a>
        <a href="#" class="col-2 ml-5">
        {{ $user->followers->count() }}
        </a>
      </div>        
      <div class="col-8 h5">
      {{ $user->biography }}
      </div>
    </div>
    
</div>
@include('postList', ['page' => 'mypage'])
@endsection