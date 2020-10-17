<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    {{-- gsc validate --}}
    <meta name="google-site-verification" content="AVzcusnl3Z57lQX9HpGkKoKhmG_NVVTkyP4r88SpQgk" />
    @yield("meta")
    <title>PulongTemple</title>
    {{-- favicon --}}
    <link rel=icon href="{{asset('image/logo_48x48.png')}}" sizes="48x48" type="image/png">
    {{-- cropper --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/cropper.js') }}"></script>
    <!-- bootstrap -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- jquery.easing.1.3.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    {{-- js --}}
    <script src="{{ asset('/js/script.js') }}"></script>
    <!-- custom -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/project.css')}}" rel="stylesheet">
    <link href="{{asset('css/btn.css')}}" rel="stylesheet">
    <link href="{{asset('css/progress.css')}}" rel="stylesheet">
    <link href="{{asset('css/member.css')}}" rel="stylesheet">
    <link href="{{asset('/css/cropper.css') }}" rel="stylesheet">
    <link href="{{asset('css/ascii.css')}}" rel="stylesheet">
    <link href="{{asset('css/ultimate.css')}}" rel="stylesheet">
    {{-- font-family --}}
    <!-- cht -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC&display=swap" rel="stylesheet">
    <!-- eng -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kumar+One+Outline&display=swap" rel="stylesheet">
  </head>
  <body>
    <!--top navbar -->
    <nav class="nav-top u-cf">
      <div class="logo">
        <a href="/">
          <img class="swap-on-hover__front-image" src="{{asset('image/logo_final.png')}}">
          <img class="swap-on-hover__back-image" src="{{asset('image/logo_final.gif')}}">
        </a>
      </div>
      <ul class="login">
        @yield("login-button")
      </ul>
    </div>
  </nav>
  @yield("body")
</body>
<footer class="footer">
  <div class="row justify-content-center">
    <div class="col-md-4 col-lg-3">
      <div class="footer-content">
        <p>社群</p>
        <span>Facebook</span>
        <br>
        <a href="https://www.facebook.com/pooliongkiong/?ref=br_rs" target="_blank">埔隆宮</a>
        <br>
        <a href="https://www.facebook.com/%E5%9F%94%E9%9A%86%E5%AE%AE-%E7%82%AD%E7%83%A4%E5%9C%9F%E5%8F%B8%E5%A4%A7%E7%8E%8B-100982504853484/?ref=br_rs" target="_blank">埔隆宮餐飲部門</a>
        <br>
        <br>
        <span>Instagram</span>
        <br>
        <a href="https://www.instagram.com/pulongtemple/">埔隆宮</a>
        <br>
        <a href="https://www.instagram.com/pulongtemple_toastking/">埔隆宮餐飲部門</a>
      </div>
    </div>
    <div class="col-md-4 col-lg-3">
      <div class="footer-content">
        <p>條款</p>
        <a href="/terms">服務條款</a>
        <br>
        <a href="/policy">隱私權政策</a>
      </div>
    </div>
    <div class="col-md-4 col-lg-3">
      <div class="footer-content">
        <p>關於</p>
        <p>Email：
          <a href="mailto:pulongtemple@gmail.com">pulongtemple@gmail.com</a>
        </p>
        <p>地址：南投縣埔里鎮大城巷 22-6</p>
        <a href="/about">關於我們</a>
      </div>
    </div>
  </div>
</footer>
</html>