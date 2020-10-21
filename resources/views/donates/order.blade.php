@extends("auth.no-login-button")
@section("body")
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 pt-5">
      @auth
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
                  <h6>NT$ {{$project_info->amount}} <small><br>/&ensp;{{$project_info->goal}}</small></h6>
                </div>
              </div>
            </div>
            {{-- selected plan --}}
            <div class="custom-bdr-3d">
              <div class="serif-tc p-4">
                <h3 class="select-title"><I> {{$option_info->title}} </I></h3>
                <div class="ff-2P pt-2">NT$ {{$option_info->price}}</div>
                <div class="pt-2">已被贊助 {{$option_info->sold}} 次</div>
                <div class="select-content"><span>{{$option_info->content}}</span></div>
              </div>
            </div>
          </div>
          {{-- donate form --}}
          <div class="col-lg-6">
            <div class="donate-form">
              <div class="">
                <div class="">
                  <form method="POST" action="{{ route('donates.new', $option_info->id) }}" name="order">
                    @csrf
                    {{--  --}}
                    <label for="amount" class="custom-bdr-dark-3d">
                      <div class="form-title">贊助金額</div>
                      <input id="amount" class="@error('amount') is-invalid @enderror" value={{ $option_info->price }} type="integer" name="amount">
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
                      <input type="hidden" name="option_id" value = "{{ $option_info->id }}">
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
                    @if($option_info->survey)
                    <label for="survey" class="custom-bdr-dark-3d">
                      <div class="form-title">{{$option_info->survey}}</div>
                      <textarea id="survey" class="@error('answer') is-invalid @enderror" type="text" name="answer"></textarea>
                    </label>
                    @endif
                    {{--  --}}
                    <label for="topic" class="custom-bdr-dark-3d">
                      <div class="form-title">{{$project_info->topic}}</div>
                      <textarea id="topic" class="@error('comment') is-invalid @enderror" type="text" name="comment"></textarea>
                      @error('comment')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </label>
                    {{--  --}}
                    @if($option_info->shipping == 1)
                    <label for="shipping" class="custom-bdr-dark-3d">
                      <div class="form-title">寄送地址</div>
                      <textarea id="shipping" class="@error('address') is-invalid @enderror" type="text" name="address"></textarea>
                      @error('address')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </label>
                    @endif
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


    // A
    // increment
    function incrementValueA() {
          var value = parseInt(document.getElementById('numberA').value, 10);
          value = isNaN(value) ? 0 : value;
          value++;
          document.getElementById('numberA').value = value;
        }
    // decrement
    function decrementValueA() {
          var value = parseInt(document.getElementById('numberA').value, 10);
          value = isNaN(value) ? 0 : value;
          if (value > 0) {
                value--;
              }
          document.getElementById('numberA').value = value;
        }

    // B
    // increment
    function incrementValueB() {
          var value = parseInt(document.getElementById('numberB').value, 10);
          value = isNaN(value) ? 0 : value;
          value++;
          document.getElementById('numberB').value = value;
        }
    // decrement
    function decrementValueB() {
          var value = parseInt(document.getElementById('numberB').value, 10);
          value = isNaN(value) ? 0 : value;
          if (value > 0) {
                value--;
              }
          document.getElementById('numberB').value = value;
        }
  </script>
@endsection
