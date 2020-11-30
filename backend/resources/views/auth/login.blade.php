@extends('layout', ['page' => 'login'])

@section('content')
<div class="container pt-5">
  <div class="row mt-5">
    <div class="col-6">
      <div class="col col-md-offset-3 col-md-9">
        <nav class="panel panel-default h5">
          <div class="panel-heading">ログイン</div>
          <div class="panel-body">
            @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
              <p>{{ $message }}</p>
              @endforeach
            </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
    <div class="co-6">
      <div class="col-12">
        ああああああああああああああああああああああああああああああ
        <!-- 画像を指定のファイルに入れ込む -->
        <img src="{{ asset('/strage/loginphoto/jojo1.jpg') }}" id="imageArea" alt="aa">
      </div>
      <!-- <script>
        const imageArea = document.getElementById('imageArea');
        const images = ['../../public', '【画像パス2】', '【画像パス3】'];

        const imageNo = Math.floor(Math.random() * images.length)
        imageArea.src = images[imageNo];
      </script> -->
    </div>