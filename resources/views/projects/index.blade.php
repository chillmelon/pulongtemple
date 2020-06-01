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
              <div class="product-content">
                {{ $project->content }}
              </div>
              {{-- progress --}}
              <div class="product-progress">
                <div>
                  <div class="progress-wrap progress" data-progress-percent="67">
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
              <div class="product-progress-nt">
                NT$ {{ $project->total_amount }}
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
// on page load...
    moveProgressBar();
    // on browser resize...
    $(window).resize(function() {
        moveProgressBar();
    });

    // SIGNATURE PROGRESS
    function moveProgressBar() {
      console.log("moveProgressBar");
        var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
        var getProgressWrapWidth = $('.progress-wrap').width();
        var progressTotal = getPercent * getProgressWrapWidth;
        var animationLength = 2500;

        // on page load, animate percentage bar to data percentage length
        // .stop() used to prevent animation queueing
        $('.progress-bar').stop().animate({
            left: progressTotal
        }, animationLength);
    }
</script>
@endsection
