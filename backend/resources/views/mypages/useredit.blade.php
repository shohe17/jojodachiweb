<!-- layoutファイル読み込み -->
@extends('layout', ['page' => 'useredit'])
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
        <h2 class="pb-3 col-12 text-black">プロフィール設定</h2>
        <form class="pl-4" action="{{ route('user.edit', ['user_name' => $user->name]) }}" method="post" enctype="multipart/form-data">
          @csrf
          <label>プロフィール画像</label>
          <div class="pb-4">
            <input type="file" id="image" name="image">
            <label for="image"></label>
          </div>
          <div>
            <label for="biography">自己紹介文</label>
            <br>
            <textarea rows="5" cols="50" name="biography" id="biography"></textarea>
          </div>
          <div>
            <button type="submit" class="btn btn-black">送信する</button>
          </div>
        </form>
      </div>
      <div class="col-md-5 img-hidden">
        <div class="card m-5 rounded-circle">
          <img class="card-img-top post-img rounded-circle" src="{{ asset('storage/' . $user->image_at) }}" alt="Card image cap">
        </div>
      </div>
    </div>
  </div>
@endsection

