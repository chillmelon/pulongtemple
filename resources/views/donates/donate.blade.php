@extends("auth.no-login-button")

@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-12 py-5">
      @auth
        <div class="row justify-content-center">
          {{-- Temporary Announce --}}
          <div class="announce col-12">
            <h4><b>臨時公告：非手機版網頁信用卡付款失敗</b></h4>
            <p>目前因收款商（綠界金流 ECPay）政策調整因素，導致非手機版網頁出現信用卡付款無法使用的問題。</p>
            <a href="https://www.ecpay.com.tw/Announcement/DetailAnnouncement?nID=3925&fbclid=IwAR0DppNzDvskmfVHqkKRnB9tY3hBv8a4EOr3Vfb-d0yvsABzQ7Fg0OMfV1c">綠界站內付調整服務公告</a>
            <ul class="mt-3">
              解決辦法：
              <li>1. 使用手機板網頁。</li>
              <li>2. 使用 超商 或 ATM 付款。</li>
            </ul>
            <p><I>非常抱歉造成各位使用者的困擾，埔隆宮祝您順心！</I></p>
          </div>
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

