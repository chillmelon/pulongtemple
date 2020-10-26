@extends("auth.no-login-button")

@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-12 py-5">
      @auth
        <div class="row justify-content-center">
          <div class="col-lg-4 mt-lg-4">
            {{-- Project status --}}
            <div class="progress-box">
              <div style="text-align: center;">
                <h4>{{$project_info->title}}</h4>
                {{--Progress circle --}}
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
            {{-- selected --}}
            @yield('selected')

          </div>
          {{-- donate-content --}}
          @yield('donate-content')

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


@endsection

