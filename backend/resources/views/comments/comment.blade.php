@extends('layout', ['page' => 'comment'])
@section('content')

<div class="container mt-5 pt-5">
  <div class="row">
    <div class="col-md-5 img-hidden">
      <div class="card mb-5">
        <img class="card-img-top post-img" src="{{ asset('storage/' . $posts->image_at) }}" alt="Card image cap">
        <div class="list-group">
          <!-- 第一引数に名前、第二引数にパラメーター -->
          <div href="{{ route('posts.comment', ['id' => $posts->id]) }}" class="list-group-item">
            {{ $posts->title }}
          </div>  
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <form class="col-12" method="post" action="{{ route('posts.comment', ['id' => $posts->id ]) }}" enctype="multipart/form-data">
        @csrf
        <div class="col-12 form-group">
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <h5>コメント入力</h5>
          <textarea rows="4" name="comment" id="comment" class="form-control col-12"></textarea>
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <input type="hidden" name="post_id" value="{{ $posts->id }}">
        </div>
        <div>
          <button type="submit" class=" btn btn-black ml-3">送信する</button>
        </div>
        <div class="p-3">
          <h5 class="card-title">コメント一覧</h5>
          <div class="list-group">
            @foreach($posts->comments as $comment)
            <div class="card-body col-12 list-group-item">
              <p class="card-text">名前：<a href="{{ route ('mypage', ['user_name' => $comment->user->name]) }}">{{ $comment->user->name }}</a></p>
              <p class="card-text h5 font-weight-normal">{{ $comment->comment }}</p>
              <p class="far fa-clock pr-3 grey-text">{{ $comment->created_at }}</p>
            </div>
            @endforeach
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection