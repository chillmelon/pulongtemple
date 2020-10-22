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
                      <input id="amount" class="@error('amount') is-invalid @enderror" value="100" type="integer" name="amount">
                      <div style="text-align: right" class="pr-4">
                        <div style="display: inline-block" class="">
                          <div id="increase" class="btn amount-btn">加100</div>
                          <div id="decrease" class="btn amount-btn">減100</div>
                        </div>
                        <div style="display: inline-block">
                          <div id="happy" class="btn amount-btn">湊整數</div>
                          <div id="lowest" class="btn amount-btn">最低金額</div>
                        </div>
                      </div>
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
		let base = 100;
	//選取按鈕
		let increase = document.querySelector('#increase');
		increase.addEventListener('click', () =>{
					increaseAmount();
				});
		let decrease = document.querySelector('#decrease');
		decrease.addEventListener('click', () =>{
					decreaseAmount();
				});
		let lowest = document.querySelector('#lowest');
		lowest.addEventListener('click', () =>{
					lowestAmount();
				});
		let happyButton = document.querySelector('#happy');
		happyButton.addEventListener('click', () =>{
					happy();
				});
		//變更金額功能
		function increaseAmount() {
					console.log(1);
					let amount = document.querySelector('#amount');
					let value = parseInt(amount.value);
					if(value >= base) {
								amount.value = value + 100;
							} else {
										amount.value = base;
									}
				}
		function decreaseAmount() {
					let amount = document.querySelector('#amount');
					let value = parseInt(amount.value)
					if((value - 100) <= base) {
								amount = base;
							} else {
										amount.value = value - 100;
									}
				}

		function lowestAmount() {
					let amount = document.querySelector('#amount');
					amount.value = base;
				}
		function happy() {
					let amount = document.querySelector('#amount');
					let value = parseInt(amount.value);
					if(value >= base) {
								amount.value = happyMoney(value);
							} else {
										amount.value = base;
									}
				}

		function happyMoney(num) {
					// 如果已經進位到百位整數
					if(Math.floor(num / 100) == num/100) {
								// 從右邊算第一位非零數的位置
								var posi = /[1-9][0]*$/.exec(Number(num).toString())[0].length - 1;
								return num + Math.pow(10,posi);
							} else {
										// 123 -> 200
										// 123001 -> 123100
										return Math.ceil(num / 100) * 100;
									}
				}
</script>
@endsection
