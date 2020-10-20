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
              <div class="col-lg-4">
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
                <div class="serif-tc custom-bdr hover-bdr p-4 my-3">
                  <h3 class="select-title"><I> title </I></h3>
                  <div class="ff-2P pt-2">NT$ price</div>
                  <div class="pt-2">已被贊助 sold 次</div>
                  <div class="pt-3">content</div>
                </div>
              </div>
              {{-- donate form --}}
              <div class="col-lg-8">
                <div class="c-box donate-form">
                  <div class="card custom-card">
                    <div class="card-body">
                      <form method="POST" action="{{ route('donates.new', $option_info->id) }}" name="order">
                        @csrf
                        {{-- select area --}}
                        <div style="display: inline-block">
                          <h3>{{ $option_info->features }}</h3>
                        </div>
                        <br>金額
                        <input class="form-control nt @error('amount') is-invalid @enderror" value={{ $option_info->price }} type="integer" name="amount">
                        @error('amount')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        贊助人
                        <input type="hidden" name="project_id" value = "{{ $project_info->id }}">
                        <input type="hidden" name="option_id" value = "{{ $option_info->id }}">
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
                          *E-mail(將會收到專案更新資訊)
                          <input class="form-control @error('email') is-invalid @enderror" type="text" name="email">
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        @endauth
                        @if($option_info->survey)
                          {{$option_info->survey}}
                          <textarea class="form-control @error('answer') is-invalid @enderror" type="text" name="answer"></textarea>
                        @endif
                        {{$project_info->topic}}
                        <textarea class="form-control @error('comment') is-invalid @enderror" type="text" name="comment"></textarea>
                        @if($option_info->shipping == 1)
                          地址
                          <textarea class="form-control @error('address') is-invalid @enderror" type="text" name="address"></textarea>
                        @endif
                        @error('address')
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
