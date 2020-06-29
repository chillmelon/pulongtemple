@section("meta")
<meta itemprop="name" content="埔隆宮募資平台">
<meta itemprop="image" content="https://photos.google.com/u/6/photo/AF1QipMnD_QEJNypNR7oQ9Da-qBXH1yyc-K18a87szIL">
<meta itemprop="description" content="埔隆宮募資平台">
{{-- facebook --}}
<meta property="og:title" content="埔隆宮募資平台" >
<meta property="og:url" content="https://pulongtemple.com/">
<meta property="og:image" content="https://photos.google.com/u/6/photo/AF1QipMnD_QEJNypNR7oQ9Da-qBXH1yyc-K18a87szIL">
<meta property="og:description" content="埔隆宮募資平台" >
@endsection

@extends('auth.login-button')
@section('body')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-11 col-xl-9">
      <div class="pltp-box-neon">
        <div>
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
          {{-- PULONG<br>
          TEMPLE --}}
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
            <div class="product-head custom-bdr-bm">
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