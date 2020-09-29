
<!DOCTYPE html>
<html>

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
  <main>
    <div class="container" style="height:1300px;">
      <div class="row mt-5 pt-5">             
      @foreach($posts as $post)
        <div class="col-lg-4 col-md-12">
        <div class="card">
          <!-- Card image -->
          <img class="card-img-top" src="{{ asset('storage/' . $post->image_at) }}" alt="Card image cap">
            <div class="list-group">

                <a href="{{ route('posts.index', ['id' => $post->id]) }}" class="list-group-item">
                  {{ $post->title }}
                </a>
             
            </div>
          <div class="rounded-bottom lighten-3 text-center pt-3">
              <ul class="list-unstyled list-inline font-small">
                  <li class="list-inline-item pr-2 grey-text"><i class="far fa-clock pr-1"></i>05/10/2015</li>
                  <li class="list-inline-item pr-2"><a href="#" class="grey-text"><i class="far fa-comments pr-1"></i>12</a></li>
                  <li class="list-inline-item"><a href="#" class="grey-text"><i class="far fa-heart pr-1"> </i>5</a></li>
              </ul>
          </div>

          </div>
        </div> 
        @endforeach投稿           
      </div>
    </div>
  </main>
</body>
</html>