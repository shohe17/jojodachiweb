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
      <h2 class="pb-2 col-12 text-info">画像投稿</h2>
      <form class="pl-4" action="{{ route('posts.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
          <label for="title" >投稿の説明</label>
          <br>
          <textarea rows="5" cols="50" name="title" id="title"></textarea>
        </div>
        <div>
          <input type="file" id="image" name="image">
          <label for="image" ></label>
        </div>
        <div>
          <button type="submit" class=" btn btn-info ">送信する</button>
        </div>
      </form>
    </div>
  </div>
@endsection

