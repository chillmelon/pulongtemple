<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    @yield("meta")
    <title>PulongTemple</title>
    {{-- favicon --}}
    <link rel=icon href="{{asset('image/logo_48x48.png')}}" sizes="48x48" type="image/png">
    {{-- cropper --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/cropper.js') }}"></script>
    <!-- bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <!-- custom -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/project.css')}}" rel="stylesheet">
    <link href="{{asset('css/btn.css')}}" rel="stylesheet">
    <link href="{{asset('css/progress.css')}}" rel="stylesheet">
    <link href="{{asset('css/member.css')}}" rel="stylesheet">
    <link href="{{asset('/css/cropper.css') }}" rel="stylesheet">
    <link href="{{asset('css/ascii.css')}}" rel="stylesheet">
    {{-- font-family --}}
    <!-- cht -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC&display=swap" rel="stylesheet">
    <!-- eng -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
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
</html>