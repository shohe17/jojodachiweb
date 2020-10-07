@extends('layout')
@section('content')

  <div class="container" sryle="height:1300px;">
    <div class="row mt-5 pt-5">
      <h2 class="col-12 text-info">画像投稿</h2>
      <br>
      <br>
      <br>
      <form action="{{ route('posts.create') }}" method="post" enctype="multipart/form-data">
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

