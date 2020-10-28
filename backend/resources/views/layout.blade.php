
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jojodachi</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

  <!-- JQuery -->
  <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
  <!-- assertでパブリックを返す -->
  <script defer src="{{ asset('/js/app.js') }}"></script>

</head>
<body>
<header>
  <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-info text-white scrolling-navbar h5">
    <a class="navbar-brand pl-2" href="/">ホーム</a>
    <!-- ハンバーガーボタン作成と条件指定 -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      @if ($page === 'index')
        <li class="nav-item">
          <a class="nav-link" href="{{ route ('posts.mypage') }}">マイページ<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route ('posts.create') }}">新規投稿</a>
        </li>
      @endif
      </ul>   

      <!-- TODO if文でホームページの時のみ検索エンジンを表示させるようにする -->

      @if ($page === 'index')
      <form action="{{ route('posts.search') }}" method="post" class="d-flex justify-content-center form-sm active-cyan-2 mr-3">
        @csrf
        <input class="form-control form-control-sm w-75" type="text" placeholder="キーワード入力" aria-label="Search" name="search">
        <button type="submit">
          <i class="fas fa-search"></i>
        </button> 
      </form>
      @endif

      <div class="my-navbar-control">
        <!-- ログインしていた場合はユーザーネームとログアウトボタンを表示させる -->
        <!-- authクラスのcheckメソッドでログインしてるかどうか確認 -->
        @if (Auth::check())
          <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
          ｜
          <a href="{{ route('login') }}" id="logout" class="my-navbar-item text-white">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        <!-- そうでない場合はログインと会員登録ボタンを表示させる -->
        @else
        <div class="text-right">
          <a class="my-navbar-item text-white" href="{{ route('login') }}">ログイン</a>
          ｜
          <a class="my-navbar-item text-white" href="{{ route('register') }}">会員登録</a>
          </div>
        @endif
      </div>
    </div>
  </nav>
</header>
<main>
  
  @yield('content')
</main>
  @if(Auth::check())
    <script>
      document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
      });
    </script>
  @endif
</body>
</html>