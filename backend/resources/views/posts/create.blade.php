
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
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info text-white scrolling-navbar">
    <a class="navbar-brand" href="/"><strong>ホームページ</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">マイページ<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">投稿ページ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">プロフィール設定ページ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ログアウト</a>
        </li>
      </ul>
      <ul class="navbar-nav">    
      </ul>
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-instagram"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<body>
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
          <input type="text" name="title" id="title">
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
</body>

