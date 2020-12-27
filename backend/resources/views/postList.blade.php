<div class="container" style="height:1000px;">
  <div class="row mt-5 pt-5">             
    @foreach($posts as $post)
      <div class="col-lg-4 col-md-12">
        <div class="card mb-3">
          <!-- Card image -->
          <!-- srcで表示する画像ファイルを指定 -->
          <img class="card-img-top post-img" src="{{ asset('storage/' . $post->image_at) }}" alt="Card image cap">
            <div class="list-group">
              <div href="{{ route('posts.index', ['id' => $post->id]) }}" class="list-group-item">
                <div>
                <a href="{{ route ('mypage', ['user_name' => $post->user->name]) }}">
                  {{ $post->user->name }}
                </a>
                </div>
                {{ $post->title }}
              </div>  
            </div>
          <div class="rounded-bottom lighten-3 text-center pt-3">
            <ul class="list-unstyled list-inline">              
              <li class="list-inline-item pr-2 grey-text"><i class="far fa-clock pr-1" ></i>{{ $post->created_at->format('Y年m月d日') }}</li>
              <li class="list-inline-item pr-2"><a href="{{ route('posts.comment', ['id' => $post->id]) }}"" class="grey-text"><i class="far fa-comments pr-1"></i>{{ $post->comments->count() }}</a></li>              
              @if($post->is_liked_by_auth_user())
                <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="far fa-heart pr-1">{{ $post->likes->count() }}</a>
              @else
                <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="far fa-heart pr-1">{{ $post->likes->count() }}</a>
              @endif
            </ul>
            <!-- マイページかつログインしているユーザーの場合 -->
            @if ($page === 'mypage' && $user->name === Auth::user()->name )
            <div class="text-right d-flex justify-content-center">
              <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-black btn-sm">編集</a>
              <form method="post" action="delete/{{$post->id}}">
              {{ csrf_field() }}
              <button class="btn btn-black btn-sm" type="submit" value="削除">削除</button>
              </form>
            </div>
            @endif
          </div>
        </div>
      </div> 
    @endforeach          
  </div>
</div>