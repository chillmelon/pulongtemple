@extends('auth.login-button')

@section('body')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 py-5">
      <div class="custom-bdr-3d p-4">
        <h5 class="text-center shadow-title p-4">
          <I>重設密碼</I>
        </h5>

        <form class="custom-form" method="POST" action="{{ route('password.update') }}">
          @csrf

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

            <div class="col-md-6">
              <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="row">
            <label for="password" class="col-md-4 col-form-label text-md-right">新密碼</label>

            <div class="col-md-6">
              <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">確認新密碼</label>

            <div class="col-md-6">
              <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div class="row mb-0">
            <div class="col-md-6 offset-md-4 p-4">
              <button type="submit" class="btn">
                重設密碼
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
