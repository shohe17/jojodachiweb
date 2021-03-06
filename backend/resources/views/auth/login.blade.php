@extends('layout', ['page' => 'login'])

@section('content')
<div class="container pt-5">
  <div class="row mt-5">
    <div class="col-6">
      <div class="col col-md-offset-3 col-md-9">
        <nav class="panel panel-default h5">
          <div class="panel-heading"  >ログイン</div>
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
                <input type="text" class="form-control" id="email" name="email" value="test@gmail.com" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" value="test1234" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-black">ログイン</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>