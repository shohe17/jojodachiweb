@extends('layout', ['page' => 'edit'])
@section('content')
  <div class="container" sryle="height:1300px;">
    <div class="row mt-5 pt-5">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $message)
              <li>{{ $message }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <h2 class="pb-2 col-12 text-info">投稿編集</h2>
      <!-- 第一引数に名前、第二引数にパラメーターを入れる -->
      <form class="pl-4" method="post" action="{{ route('posts.edit', ['id' => $post->id ]) }}" enctype="multipart/form-data">
        @csrf
        <div class="pb-3">
          <h5>投稿の説明</h5>
          <!-- 遷移前に入力されているviewデータを持ってくる -->
          <input type="text" style="width: 400px;" name="title" id="title" value="{{ old('title') ?? $post->title }}" placeholde="説明文">
        </div>
        <div>
          <button type="submit" class=" btn btn-info ">送信する</button>
        </div>
      </form>
    </div>
  </div>
@endsection

