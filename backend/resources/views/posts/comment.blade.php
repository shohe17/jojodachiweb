@extends('layout', ['page' => 'comment'])
@section('content')

<div class="container mt-5 pt-5">
  <div class="row">
    <div class="col-md-5  img-hidden">
      <div class="card">
        <!-- Card image -->
        <img class="card-img-top" src="{{ asset('storage/' . $posts->image_at) }}" alt="Card image cap">
          <div class="list-group">
            <!-- 第一引数に名前、第二引数にパラメーター -->
            <div href="{{ route('posts.comment', ['id' => $posts->id]) }}" class="list-group-item">
              {{ $posts->title }}
            </div>  
          </div>
        <div class="rounded-bottom lighten-3 text-center pt-3">
          <ul class="list-unstyled list-inline">              
            <li class="list-inline-item pr-2 grey-text"><i class="far fa-clock pr-1" ></i>{{ $posts->created_at->format('Y年m月d日') }}</li>
            <li class="list-inline-item pr-2"><a href="#" class="grey-text"><i class="far fa-comments pr-1"></i>12</a></li> 
            @if($posts->is_liked_by_auth_user())
              <a href="{{ route('post.unlike', ['id' => $posts->id]) }}" class="far fa-heart pr-1">{{ $posts->likes->count() }}</a>
            @else
              <a href="{{ route('post.like', ['id' => $posts->id]) }}" class="far fa-heart pr-1">{{ $posts->likes->count() }}</a>
            @endif
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <div class="row">
      @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <h2 class="col-12 text-info">画像投稿</h2>
        <br>
        <br>
        <br>
        <form method="post" action="{{ route('posts.comment', ['id' => $posts->id ]) }}" enctype="multipart/form-data">
                     <!-- "{{ route('posts.edit', ['id' => $posts->id ]) }}" -->
          @csrf
          <div>
            <label for="title" >投稿の説明</label>
            <br>
            <textarea rows="5" cols="70" name="comment" id="comment"></textarea>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="post_id" value="{{ $posts->id }}">
          </div>
          <div>
            <button type="submit" class=" btn btn-info ">送信する</button>
          </div>
          <div class="p-3">
            <h5 class="card-title">コメント一覧</h5>
              <div class="list-group">
                <div class="card-body list-group-item">
                  @foreach($posts->comments as $comment)
                  <p class="card-text"><a href=""></a></p>
                  <p class="card-text">{{ $comment->comment }}</p>
                  @endforeach
                </div>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection