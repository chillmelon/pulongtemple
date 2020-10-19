@extends("auth.no-login-button")
@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-12">
      @auth
      <br>
      <br>
      <div class="donate-box">
        <div class="row">
          {{-- Progress bar --}}
          <div class="col-lg-4">
            <div class="progress-box">
              <div style="text-align: center;">
                <h4>{{$project_info->title}}</h4>
                {{-- circle --}}
                <div style="height: 200px">
                  <div class="circle-pg-box ab-center">
                    <div class="circle-pg">
                      <div class="circle-pg-inner">
                        <div class="percent">{{$project_info->progress}}%</div>
                        <div class="water" data-percent="{{$project_info->progress}}"></div>
                        <div class="glare"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="ff-2P">
                  <h6>NT$ {{$project_info->amount}} <small><br>/&ensp;{{$project_info->goal}}</small></h5>
                </div>
              </div>
            </div>
          </div>
          {{-- plan --}}
          <div class="col-lg-8">
            <div class="row">
							<div class="col-lg-6">
								<div class="serif-tc custom-bdr hover-bdr p-4 my-3" onclick="location.href='/donate/{{$project_info->id}}'">
                  <h3 class="select-title"><I>純贊助，別無所求。</I></h3>
                  <div class="ff-2P pt-2">NT$ ???</div>
									<div class="pt-2">已被贊助 {{$project_info->supporters}} 次</div>
									<div></div>
								</div>
							</div>
							@foreach($project_info->options as  $option)
              <div class="col-lg-6">
								<div class="serif-tc custom-bdr hover-bdr p-4 my-3" onclick="location.href='/donate/option/{{$option->id}}'">
									<h3 class="select-title"><I> {{ $option->title }} </I></h3>
									<div class="ff-2P pt-2">NT$ {{$option->price}}</div>
									<div class="pt-2">已被贊助 {{$option->sold}} 次</div>
                  <div class="pt-3">{{$option->content}}</div>
                </div>
              </div>
							@endforeach
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="inform">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="login-ascii-box">
              <pre class="login-ascii overf-v ab-center">
██        ██████    ██████   ██  ███    ██  ██████ 
██       ██    ██  ██        ██  ████   ██       ██ 
██       ██    ██  ██   ███  ██  ██ ██  ██    ▄███  
██       ██    ██  ██    ██  ██  ██  ██ ██    ▀▀   
███████   ██████    ██████   ██  ██   ████    ██ 
              </pre>
            </div>
          </div>
          <div class="col-12">
            <h5 style="line-height: 32px; text-align: center;">
            <br>
            加入會員可以記錄每一筆的贊助，<br>
            也可以發起屬於自己的募資專案，<br>
            還可以加入贊助排行榜的競爭！
            </h5>
            <br>
          </div>
          <div class="to-login col-10 col-lg-6">
            <a class="btn" href="{{ route('login') }}"><span>註冊或登入</span></a>
          </div>
        </div>
      </div>
      @endauth
    </div>
  </div>
</div>
<script type="text/javascript">
// on page load...
porgressCircle();
// on browser resize...
$(window).resize(function() {
  porgressCircle();
});
</script>
@endsection
