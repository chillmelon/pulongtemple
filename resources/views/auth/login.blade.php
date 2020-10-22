@extends("auth.no-login-button")

@section('body')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          {{-- register --}}
          <div class="col-lg-6">
            <h6 class="pl-4 mt-5">現在加入</h6>
            <div class="custom-form custom-bdr-3d">
              <h4 class="form-title select-title p-3">註冊</h4>
              <div class="">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="row m-2">
                    <label for="name" class="col-md-4 text-md-right">姓名</label>
                    <div class="col-md-6">
                      <input id="name" type="text"
                        class="custom-bdr @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row m-2">
                    <label for="email" class="col-md-4 text-md-right">E-Mail</label>
                    <div class="col-md-6">
                      <input id="email" type="email"
                        class="custom-bdr @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row m-2">
                    <label for="password" class="col-md-4 text-md-right">密碼</label>
                    <div class="col-md-6">
                      <input id="password" type="password"
                        class="custom-bdr @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row m-2">
                    <label for="password-confirm" class="col-md-4 text-md-right">確認密碼</label>
                    <div class="col-md-6">
                      <input id="password-confirm" type="password" class="custom-bdr"
                        name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                  <div class="row m-2">
                    <div class="col-md-6 offset-md-4 ">
                      <button type="submit" class="btn my-3">
                        註冊
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- login --}}
          <div class="col-lg-6">
            <h6 class="pl-4 mt-5">已經是會員</h6>
            <div class="custom-form custom-bdr-3d">
              <h4 class="form-title select-title p-3">登入</h4>
              <div class="">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="row m-2">
                    <label for="email" class="col-md-4 text-md-right">E-Mail</label>
                    <div class="col-md-6">
                      <input id="email" type="email"
                        class="custom-bdr @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row m-2">
                    <label for="password" class="col-md-4 text-md-right">密碼</label>
                    <div class="col-md-6">
                      <input id="password" type="password"
                        class="custom-bdr @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row m-2 from-group">
                    <div class="col-md-6 offset-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember"
                          id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                          記住我
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row m-2">
                    <div class="col-md-6 offset-md-4 mb-3">
                      <button type="submit" class="btn mt-3">
                        登入
                      </button>
                    </div>
                    <div class="col-md-6 offset-md-4">
                      <a class="btn my-3" href="{{ route('password.request') }}">
                        忘記密碼?
                      </a>
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
