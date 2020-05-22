@extends("auth.no-login-button")
@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8 col-xl-6">

      @auth
      <br>
      <br>
      @else
      <div class="inform">
        <div class="login-ascii-box">
          <pre class="login-ascii">
 ___       ______   _______  __   _____  ___       ________
|"  |     /    " \ /" _   "||" \ (\"   \|"  \     ("      "\
||  |    // ____  (: ( \___)||  ||.\\   \    |     \___/   :)
|:  |   /  /    ) :)/ \     |:  ||: \.   \\  |       /  ___/
 \  |__(: (____/ ////  \ ___|.  ||.  \    \. |      //  \
( \_|:  \        /(:   _(  _/\  |\    \    \ |     ('___/
 \_______)"_____/  \_______|__\_|_)___|\____\)      (___)

          </pre>
        </div>
        <br>
        <h5>
        &emsp;登入會員可以記錄每一筆的贊助，<br>
        &emsp;也可以發起屬於自己的募資專案。
        </h5>
      </div>
      <div class="to-login">
        <a class="btn btn-5" href="{{ route('login') }}"><span>註冊或登入</span></a>
      </div>
      <div class="continue">
        <h4>太麻煩了，直接贊助 👇</h4>
      </div>
      @endauth

      <div class="c-box donate-form ">
        <div class="card custom-card">
          <div class="card-header">贊助專案：{{ $project_info['title'] }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('donates.new', $project_info['id']) }}" name="donation">
              @csrf
              贊助人
              <input type="hidden" name="project_id" value = "{{ $project_info['id'] }}">
              <input type="hidden" name="user_id" value = "{{ auth()->user()['id'] }}">
              <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value = "{{ auth()->user()['name'] }}" >
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              金額$
              <input class="form-control @error('amount') is-invalid @enderror" type="integer" name="amount">
              @error('amount')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              E-mail(將會收到專案更新資訊)
              <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ auth()->user()['email'] }}">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              留言(選填)
              <textarea class="form-control comment" type="text" name="comment"></textarea>
              <div class="send">
                <button class="btn btn-5">確定</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection