@extends('auth.login-button')

@section("meta")
<meta itemprop="name" content="埔隆宮募資平台">
<meta itemprop="image" content="https://lh3.googleusercontent.com/pw/ACtC-3fzzkHRKRhEkhagxiYgYSJoye2sWKQJ5kwBRQjD66tZwIo9SWcL7C_vTV2Go0au-jiB1xBZPFtB6kdkz6zeo6MJ1x-5SaI7l2gUW5SCXkoyh99nTgsWDSIMkR0pJ6MOQ-4SoIgoisvdTV2D4mEWs3w=s949-no?authuser=6">
<meta itemprop="description" content="埔里鎮的每個人給我10塊錢，我就有80萬了。
對，做事情要花錢。公共性的事情不是政府做就是政府發錢給民間做，所以還是政府在做。政府做事就是慢，程序很多。所以我們募資，直接把錢給要做事的人。

有人在燒草很臭？大家募資買個樹枝粉碎機。

想要一個滑板場？大家募資租一個倉庫來玩。

為埔里好的事我們都要支持！">
{{-- facebook --}}
<meta property="og:title" content="埔隆宮募資平台" >
<meta property="og:url" content="https://pulongtemple.com/">
<meta property="og:image" content="https://lh3.googleusercontent.com/pw/ACtC-3fzzkHRKRhEkhagxiYgYSJoye2sWKQJ5kwBRQjD66tZwIo9SWcL7C_vTV2Go0au-jiB1xBZPFtB6kdkz6zeo6MJ1x-5SaI7l2gUW5SCXkoyh99nTgsWDSIMkR0pJ6MOQ-4SoIgoisvdTV2D4mEWs3w=s949-no?authuser=6">
<meta property="og:description" content="埔里鎮的每個人給我10塊錢，我就有80萬了。
對，做事情要花錢。公共性的事情不是政府做就是政府發錢給民間做，所以還是政府在做。政府做事就是慢，程序很多。所以我們募資，直接把錢給要做事的人。

有人在燒草很臭？大家募資買個樹枝粉碎機。

想要一個滑板場？大家募資租一個倉庫來玩。

為埔里好的事我們都要支持！" >
@endsection

@section('body')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-11 col-xl-9">
      <div class="pltp-box-neon">
        <div>
          {{-- PULONG TEMPLE --}}
          <span class="neon">P</span>
          <span class="neon">U</span>
          <span class="neon">L</span>
          <span class="neon">O</span>
          <span class="neon">N</span>
          <span class="neon">G</span>
          <br>
          <span class="neon">T</span>
          <span class="neon">E</span>
          <span class="neon">M</span>
          <span class="neon">P</span>
          <span class="neon">L</span>
          <span class="neon">E</span>
        </div>
        <div class="arrow-box">
          <span class="arrow">︾</span><br>
          <span class="arrow">︾</span><br>
          <span class="arrow">︾</span>
        </div>
      </div>
      {{-- product --}}
      <div class="row justify-content-center">
        @foreach($projects as $project)
        <div class="product-box col-12 col-md-6">
          <div class="product custom-bdr" onclick="location.href='projects/{{ $project->id }}';">
            <div class="product-head custom-bdr-bm serif-tc">
              {{ $project->title }}
            </div>
            <div class="product-body custom-bdr-bm">
              <div class="imgbox">
                <div class="imgbox-inner">
                  <div class="image" style="background-image: url('{{asset('/storage/'. $project->image)}}');"></div>
                </div>
              </div>
              <div class="product-summary">
                {{ $project->summary }}
              </div>
              {{-- progress --}}
              <div class="product-progress">
                <div>
                  <div id="{{ $project->id }}" class="progress-wrap progress ff-2P" data-percent="{{ $project->progress }}">
                    <span>{{ $project->progress }}%</span>
                    <div class="progress-bar progress"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="time-nt">
              @if ($project->days_left < 0)
              <div class="product-progress-time">
                專案結束
              </div>
              @else
              <div class="product-progress-time">
                剩下 {{ $project->days_left }} 天
              </div>
              @endif

              <div class="product-progress-nt ff-2P">
                GOAL:NT${{ $project->goal }}
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          // on page load...
          indexProgressBar({{ $project->id }});
          // on browser resize...
          $(window).resize(function() {
            indexProgressBar({{ $project->id }});
          });
        </script>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection