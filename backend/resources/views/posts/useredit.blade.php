@extends('layout', ['page' => 'useredit'])
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
      <h2 class="pb-3 col-12 text-info">プロフィール設定</h2>
      <form class="pl-4" action="{{ route('user.edit', ['user_name' => $user->name]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>プロフィール画像</label>
        <div class="pb-4">
          <input type="file" id="image" name="image">
          <label for="image"></label>
        </div>
        <div>
          <label for="title">自己紹介文</label>
          <br>
          <textarea rows="5" cols="50" name="title" id="title"></textarea>
        </div>
        <div>
          <button type="submit" class="btn btn-info">送信する</button>
        </div>
      </form>
    </div>
  </div>
@endsection

