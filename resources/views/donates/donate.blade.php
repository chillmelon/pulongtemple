@extends("auth.no-login-button")
@section("body")
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
      @auth
      <br>
      <br>
      @else
      <div class="inform">
        <div class="login-ascii-box">
          <pre class="login-ascii">
 _                       _           ___
| |       ___     __ _  (_)  _ __   |__ \
| |      / _ \   / _` | | | | '_ \    / /
| |___  | (_) | | (_| | | | | | | |  |_|
|_____|  \___/   \__, | |_| |_| |_|  (_)
                 |___/
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
      <div class="row">
        {{-- Progress bar --}}
        <div class="progress-box col-md-4">
          <div class="row justify-content-center">
            <div>
              <h4>{{$project_info['title']}}</h4>
              {{-- circle --}}
              <div class="progress-circle">
                <div class="green">
                  <div class="progress">
                    <div class="inner">
                      <div class="percent"><span>30</span>%</div>
                      <div class="water"></div>
                      <div class="glare"></div>
                    </div>
                  </div>
                </div>
              </div>
              <h3>NT${{$project_info['total_amount']}} <small>&ensp;/&ensp;NT${{$project_info['goal']}}</small></h3>
            </div>
          </div>
        </div>
        {{-- donate form --}}
        <div class="c-box donate-form col-md-8">
          <div class="card custom-card">
            {{-- <div class="card-header">贊助專案：{{ $project_info['title'] }}</div> --}}
            <div class="card-body">
              <form method="POST" action="{{ route('donates.new', $project_info['id']) }}" name="donation">
                @csrf
                <h3>&ensp;輸入金額</h3>
                <input class="form-control amount @error('amount') is-invalid @enderror" type="integer" name="amount">
                @error('amount')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                &ensp;贊助人
                <input type="hidden" name="project_id" value = "{{ $project_info['id'] }}">
                <input type="hidden" name="user_id" value = "{{ auth()->user()['id'] }}">
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value = "{{ auth()->user()['name'] }}" >
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                &ensp;E-mail(將會收到專案更新資訊)
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ auth()->user()['email'] }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                &ensp;留言(選填)
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
</div>
@endsection