@extends('layout', ['page' => 'create'])
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
      <h2 class="pb-2 col-12 text-black">画像投稿</h2>
      <form class="pl-4" action="{{ route('posts.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="pb-3">
          <h5>投稿の説明</h5>
          <textarea rows="5" cols="50" name="title" id="title"></textarea>
        </div>
        <div class="pb-3">
          <h5>画像選択</h5>
          <input type="file" id="image" name="image">
          <label for="image"></label>
        </div>
        <div>
          <button type="submit" class=" btn btn-black">送信する</button>
        </div>
      </form>
    </div>
  </div>
@endsection

