@extends('layout', ['page' => 'edit'])
@section('content')
  <div class="container" sryle="height:1300px;">
    <div class="row mt-5 pt-5">
      <div class="col-md-7">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $message)
              <li>{{ $message }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <h2 class="pb-2 col-12 text-black">投稿編集</h2>
      <!-- 第一引数に名前、第二引数にパラメーターを入れる -->
      <form class="pl-4" method="post" action="{{ route('posts.edit', ['id' => $post->id ]) }}" enctype="multipart/form-data">
        @csrf
        <div class="pb-3">
          <h5>投稿の説明</h5>
          <!-- 遷移前に入力されているviewデータを持ってくる -->
          <input type="text" style="width: 400px;" name="title" id="title" value="{{ old('title') ?? $post->title }}" placeholde="説明文">
        </div>
        <div>
          <button type="submit" class=" btn btn-black">送信する</button>
        </div>
      </form>
      </div>
      <div class="col-md-5 img-hidden">
        <div class="card m-5 rounded-circle">
          <img class="card-img-top post-img rounded-circle" src="{{ asset('storage/' . $post->image_at) }}" alt="Card image cap">
        </div>
      </div>
    </div>
  </div>
@endsection

