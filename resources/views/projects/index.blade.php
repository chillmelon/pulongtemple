@extends('auth.login-button')
@section('body')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-11 col-xl-9">
      <div class="pltp-box">
        <pre class="pltp overf-v ab-center">
██████╗  ██╗   ██╗ ██╗       ██████╗  ███╗   ██╗  ██████╗
██╔══██╗ ██║   ██║ ██║      ██╔═══██╗ ████╗  ██║ ██╔════╝
██████╔╝ ██║   ██║ ██║      ██║   ██║ ██╔██╗ ██║ ██║  ███╗
██╔═══╝  ██║   ██║ ██║      ██║   ██║ ██║╚██╗██║ ██║   ██║
██║      ╚██████╔╝ ███████╗ ╚██████╔╝ ██║ ╚████║ ╚██████╔╝
╚═╝       ╚═════╝  ╚══════╝  ╚═════╝  ╚═╝  ╚═══╝  ╚═════╝
████████╗ ███████╗ ███╗   ███╗ ██████╗  ██╗      ███████╗
╚══██╔══╝ ██╔════╝ ████╗ ████║ ██╔══██╗ ██║      ██╔════╝
   ██║    █████╗   ██╔████╔██║ ██████╔╝ ██║      █████╗
   ██║    ██╔══╝   ██║╚██╔╝██║ ██╔═══╝  ██║      ██╔══╝
   ██║    ███████╗ ██║ ╚═╝ ██║ ██║      ███████╗ ███████╗
   ╚═╝    ╚══════╝ ╚═╝     ╚═╝ ╚═╝      ╚══════╝ ╚══════╝
        </pre>
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
              <div class="product-progress-time">
                剩下 {{ $project->days_left }} 天
              </div>
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