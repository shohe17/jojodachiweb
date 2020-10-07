@extends('layout')
@section('contet')
  <div class="container" style="height:1300px;">
    <div class="account-info">
      <div class=".mt-5" class=".list-group-horizontal">
        <div>たこ</div>
        <div>たこ</div>
      </div>
    </div>
          <!-- 左に画像表示、右に投稿、フォロー、フォロワー数 
        ユーザー名
        説明文 -->
    <div class="row mt-5 pt-5">             
    @foreach($posts as $post)
      <div class="col-lg-4 col-md-12">  
      <div class="card">
        <!-- Card image -->
        <img class="card-img-top" src="{{ asset('storage/' . $post->image_at) }}" alt="Card image cap">
          <div class="list-group">
            <div href="{{ route('posts.mypage', ['id' => $post->id]) }}" class="list-group-item">
              {{ $post->title }}
            </div>  
          </div>
        <div class="rounded-bottom lighten-3 text-center pt-3">
          <ul class="list-unstyled list-inline font-small">
            <li class="list-inline-item pr-2 grey-text"><i class="far fa-clock pr-1"></i>05/10/2015</li>
            <li class="list-inline-item pr-2"><a href="#" class="grey-text"><i class="far fa-comments pr-1"></i>12</a></li>
            <li class="list-inline-item"><a href="#" class="grey-text"><i class="far fa-heart pr-1"> </i>5</a></li>
          </ul>        
              <!-- 一つ目の引数に名前、二つ目の引数にidっていう名前のパラメーターにぱらめーたーのIDヲイレル -->
            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="list-inline-item pr-2">編集</a>
          <form method="post" action="delete/{{$post->id}}">
          {{ csrf_field() }}
            <input class="list-inline-item pr-2" type="submit" value="削除">
          </form>
        </div>
        </div>
      </div> 
      @endforeach          
    </div>
  </div>
</body>
</html>
