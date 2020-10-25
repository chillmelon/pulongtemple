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

<script type="text/javascript">
  // on page load...
  porgressCircle();
  // on browser resize...
  $(window).resize(function() {
  porgressCircle();
  });

  //選取按鈕
  let base = 50;

  //變更金額功能

  // function increaseAmount() {
  //   let amount = document.querySelector('#amount');
  //   let value = parseInt(amount.value);
  //   if(value >= base) {
  //     amount.value = value + 100;
  //   } else {
  //     amount.value = base;
  //   }
  // }
  // function decreaseAmount() {
  //   let amount = document.querySelector('#amount');
  //   let value = parseInt(amount.value)
  //   if((value - 100) < base) {
  //     amount = base;
  //   } else {
  //     amount.value = value - 100;
  //   }
  // }

  function addMarlboro() {
    let amount = document.querySelector('#amount');
    let value = parseInt(amount.value);
    if(value >= base) {
      amount.value = value + 110;
    } else {
      amount.value = base;
    }
  }

  function addCabbage() {
    let amount = document.querySelector('#amount');
    let value = parseInt(amount.value);
    if(value >= base) {
      amount.value = value + 1300;
    } else {
      amount.value = base;
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

  // let increase = document.querySelector('#increase');
  // increase.addEventListener('click', () =>{
  //   increaseAmount();
  // });
  // let decrease = document.querySelector('#decrease');
  // decrease.addEventListener('click', () =>{
  //   decreaseAmount();
  // });

  let marlboro = document.querySelector('#marlboro');
  marlboro.addEventListener('click', () =>{
    addMarlboro();
  });

  let cabbage = document.querySelector('#cabbage');
  cabbage.addEventListener('click', () =>{
    addCabbage();
  });

  let lowest = document.querySelector('#lowest');
  lowest.addEventListener('click', () =>{
    lowestAmount();
  });

  let happyButton = document.querySelector('#happy');
  happyButton.addEventListener('click', () =>{
    happy();
  });

</script>
@endsection
