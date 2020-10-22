@extends("auth.no-login-button")
@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-9">
      @auth
      <br>
      <br>
      <div class="donate-box">
        <div class="row">
          <div class="col-lg-6">
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
            {{-- selected plan --}}
            <div class="custom-bdr-dark-3d">
              <div class="serif-tc p-4">
                <h3 class="select-title"><I> 純贊助 </I></h3>
                <div class="ff-2P pt-2">NT$ ???</div>
                <div class="pt-2">已被贊助 {{$project_info->supporters}} 次</div>
                <div class="select-content"><span>隨喜樂捐，不求回報。</span></div>
              </div>
            </div>
          </div>
          {{-- donate form --}}
          <div class="col-lg-6">
            <div class="custom-form">
              <div class="">
                <div class="">
                  <form method="POST" action="{{ route('donates.new', $project_info->id) }}" name="donation">
                    @csrf
                    {{-- select area --}}
                    {{-- <div style="display: inline-block">
                      衣服(件)
                      <div class="select">
                        <input class="form-control text-select" type="text" id="numberA" value="0" width="5"/>
                        <input class="btn btn-nohover" type="button" onclick="incrementValueA()" value="▲"/>
                        <input class="btn btn-nohover" type="button" onclick="decrementValueA()" value="▼"/>
                      </div>
                    </div>
                    <div style="display: inline-block">
                      票(張)
                      <div class="select">
                        <input class="form-control text-select" type="text" id="numberB" value="0" width="5"/>
                        <input class="btn btn-select" type="button" onclick="incrementValueB()" value="▲"/>
                        <input class="btn btn-select" type="button" onclick="decrementValueB()" value="▼"/>
                      </div>
                    </div> --}}


                    {{--  --}}
                    <label for="amount" class="custom-bdr-dark-3d">
                      <div class="form-title">贊助金額</div>
                      <input id="amount" class="@error('amount') is-invalid @enderror" type="integer" name="amount">
                      @error('amount')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </label>
                    {{--  --}}
                    <label for="d-name" class="custom-bdr-dark-3d">
                      <div class="form-title">贊助人</div>
                      <input type="hidden" name="project_id" value = "{{ $project_info->id }}">
                      <input type="hidden" name="user_id" value = "{{ auth()->user()['id'] }}">
                      @auth
                        <input id="d-name" class="@error('name') is-invalid @enderror" type="text" name="name" value = "{{ auth()->user()['name'] }}">
                      @else
                        <input id="d-name" class="@error('name') is-invalid @enderror" type="text" name="name">
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      @endauth
                    </label>
                    {{--  --}}
                    <label for="topic" class="custom-bdr-dark-3d">
                      <div class="form-title">留言(選填)</div>
                      <textarea id="topic" class="@error('comment') is-invalid @enderror" type="text" name="comment"></textarea>
                      @error('comment')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </label>
                    {{-- e-mail --}}
                    @auth
                      <input class="form-control @error('email') is-invalid @enderror" type="hidden" name="email" value="{{ auth()->user()['email'] }}">
                    @endauth
                    {{-- btn --}}
                    <div class="custom-bdr-3d custom-bdr-3d-hover">
                      <button class="btn">去付款</button>
                    </div>
                  </form>
                </div>
              </div>
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