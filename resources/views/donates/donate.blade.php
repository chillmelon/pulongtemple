@extends("auth.no-login-button")
@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-9">
      @auth
      <br>
      <br>
      @else
      <div class="inform">
        <div class="row">
          <div class="col-lg-6">
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
          <div class="col-12 col-lg-6">
            <h5 style="line-height: 32px; text-align: center;">
            <br>
            登入會員可以記錄每一筆的贊助，<br>
            也可以發起屬於自己的募資專案，<br>
            還可以加入贊助排行榜的競爭喔！
            </h5>
          </div>
        </div>
      </div>
      <div class="to-login">
        <a class="btn" href="{{ route('login') }}"><span>註冊或登入</span></a>
      </div>
      <div style="text-align: center; padding: 16px 0;">
        <h4>太麻煩了，直接贊助 👇</h4>
      </div>
      @endauth
      <div class="donate-box custom-bdr">
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
          {{-- donate form --}}
          <div class="col-lg-8">
            <div class="c-box donate-form">
              <div class="card custom-card">
                <div class="card-body">
                  <form method="POST" action="{{ route('donates.new', $project_info->id) }}" name="donation">
                    @csrf
                    <h3>&ensp;*輸入金額</h3>
                    <input class="form-control nt @error('amount') is-invalid @enderror" type="integer" name="amount">
                    @error('amount')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    &ensp;贊助人
                    <input type="hidden" name="project_id" value = "{{ $project_info->id }}">
                    <input type="hidden" name="user_id" value = "{{ auth()->user()['id'] }}">
                    @auth
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value = "{{ auth()->user()['name'] }}">
                    @else
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @endauth
                    @auth
                    <input class="form-control @error('email') is-invalid @enderror" type="hidden" name="email" value="{{ auth()->user()['email'] }}">
                    @else
                    &ensp;*E-mail(將會收到專案更新資訊)
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @endauth
                    &ensp;留言(選填)
                    <textarea class="form-control @error('comment') is-invalid @enderror" type="text" name="comment"></textarea>
                    @error('comment')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="send">
                      <button class="btn">確定</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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