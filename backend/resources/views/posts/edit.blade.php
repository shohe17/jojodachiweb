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
      <h2 class="col-12 text-info">投稿編集</h2>
      <br>
      <br>
      <br>
      <!-- 第一引数に名前、第二引数にパラメーターを入れる -->
      <form method="post" action="{{ route('posts.edit', ['id' => $post->id ]) }}" enctype="multipart/form-data">
        @csrf
        <div>
          <label for="title" >投稿の説明</label>
          <br>
          <input type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}" placeholde="説明文">
        </div>
        <div>
          <input type="file" id="image" name="image" value="{{ old('image') ?? $post->image_at }}">
          <label for="image" ></label>
        </div>
        <div>
          <button type="submit" class=" btn btn-info ">送信する</button>
        </div>
      </form>
    </div>
  </div>
@endsection

