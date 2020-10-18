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
                <div class="plan custom-bdr hover-bdr" onclick="location.href='/donate/option/'">
                  <h4><b>票*1</b></h4>
                  <div class="ff-2P pt-2">NT$ </div>
                  <div class="pt-2">已被贊助 次</div>
                  <div></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="plan custom-bdr hover-bdr" onclick="location.href='/donate/option/'">
                  <h4><b>票*2</b></h4>
                  <div class="ff-2P pt-2">NT$ </div>
                  <div class="pt-2">已被贊助 次</div>
                  <div></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="plan custom-bdr hover-bdr" onclick="location.href='/donate/option/'">
                  <h4><b>票*4</b></h4>
                  <div class="ff-2P pt-2">NT$ </div>
                  <div class="pt-2">已被贊助 次</div>
                  <div></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="plan custom-bdr hover-bdr" onclick="location.href='/donate/option/'">
                  <h4><b>衣*1</b></h4>
                  <div class="ff-2P pt-2">NT$ </div>
                  <div class="pt-2">已被贊助 次</div>
                  <div></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="plan custom-bdr hover-bdr" onclick="location.href='/donate/option/'">
                  <h4><b>衣*2</b></h4>
                  <div class="ff-2P pt-2">NT$ </div>
                  <div class="pt-2">已被贊助 次</div>
                  <div></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="plan custom-bdr hover-bdr" onclick="location.href='/donate/option/'">
                  <h4><b>衣*4</b></h4>
                  <div class="ff-2P pt-2">NT$ </div>
                  <div class="pt-2">已被贊助 次</div>
                  <div></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="plan custom-bdr hover-bdr" onclick="location.href='/donate/option/'">
                  <h4><b>純贊助</b></h4>
                  <div class="ff-2P pt-2">NT$ </div>
                  <div class="pt-2">已被贊助 次</div>
                  <div></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="plan custom-bdr hover-bdr" onclick="location.href='/donate/option/'">
                  <h4><b>衣服+贊助</b></h4>
                  <div class="ff-2P pt-2">NT$ </div>
                  <div class="pt-2">已被贊助 次</div>
                  <div></div>
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