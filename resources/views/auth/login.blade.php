@extends("auth.no-login-button")

@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row">
        {{-- login --}}
        <div class="col-lg-6 c-box">
          <h5 style="padding: 16px;">已經是會員~</h5>
          <div class="card custom-card custom-bdr">
            <div class="card-header">登入</div>
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">密碼</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                        記住我
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-0 btn-box">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-5">
                    登入
                    </button>
                    @if (Route::has('password.request'))
                    <a class="btn btn-5" href="{{ route('password.request') }}">
                      忘記密碼?
                    </a>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        {{-- register --}}
        <div class="col-lg-6 c-box">
          <h5 style="padding: 16px;">現在加入~</h5>
          <div class="card custom-card custom-bdr">
            <div class="card-header">註冊</div>
            <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">暱稱</label>
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">密碼</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">確認密碼</label>
                  <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>
                <div class="form-group row mb-0 btn-box">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-5">
                    註冊
                    </button>
                  </div>
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