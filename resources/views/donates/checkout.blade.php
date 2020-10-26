@extends('donates.donate')

@section('selected')
<div class="custom-bdr-dark-3d">
  <div class="serif-tc p-4">
    <h3 class="shadow-title"><I> 純贊助 </I></h3>
    <div class="ff-2P pt-2">NT$ ???</div>
    <div class="pt-2">已被贊助 {{$project_info->donors}} 次</div>
    <div class="select-content"><span>隨喜樂捐，不求回報。</span></div>
  </div>
</div>
@endsection

@section('donate-content')
<div class="col-lg-6">
  <div class="custom-form">
    <div class="">
      <div class="">
        <form method="POST" action="{{ route('donates.new', $project_info->id) }}" name="donation">
          @csrf
          {{--  --}}
          <label for="amount" class="custom-bdr-dark-3d">
            <div class="form-title">贊助金額</div>
            <input id="amount" class="mb-2 @error('amount') is-invalid @enderror"
              value="50" type="number" name="amount">
            <div class="amount-area ml-2 pb-2 d-flex justify-content-end flex-wrap">
              <div>
                <div id="marlboro" class="btn">▴加一包菸</div>
                <div id="cabbage" class="btn">▴加顆白菜</div>
              </div>
              <div>
                <div id="happy" class="btn">▴不用找了</div>
                <div id="lowest" class="btn">▾最低金額</div>
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

<script type="text/javascript">
  // on page load...
  porgressCircle();
  // on browser resize...
  $(window).resize(function() {
  porgressCircle();
  });

  //變更金額功能
  let base = 50;

  function happy() {
    let amount = document.querySelector('#amount');
    let value = parseInt(amount.value);
    if (value >= base) {
      amount.value = happyMoney(value);
    } else {
      amount.value = base;
    }
  }
  function happyMoney(num) {
    // 如果已經進位到百位整數
    if (Math.floor(num / 100) == num/100) {
      // 從右邊算第一位非零數的位置
      var posi = /[1-9][0]*$/.exec(Number(num).toString())[0].length - 1;
      return num + Math.pow(10,posi);
    } else {
      // 123 -> 200
      // 123001 -> 123100
      return Math.ceil(num / 100) * 100;
    }
  }
  function increase(amount, increaseAmount) {
    let value = parseInt(amount.value);
    if (value >= base) {
      amount.value = value + increaseAmount;
    } else {
      amount.value = base;
    }
  }
  function modifyAmount(btnID) {
    let amount = document.querySelector('#amount');
    if (btnID == '#lowest') {
      amount.value = base;
    } else if (btnID == '#happy') {
      happy();
    } else {
      if (btnID == '#marlboro') {
        increase(amount, 110);
      } else if (btnID == '#cabbage') {
        increase(amount, 1300);
      }
    }
  }
  function btnClick(btnID) {
    let btn = document.querySelector(btnID);
    btn.addEventListener('click', () => {
      modifyAmount(btnID);
    });
  }

  btnClick('#marlboro');
  btnClick('#cabbage');
  btnClick('#lowest');
  btnClick('#happy');
</script>
@endsection