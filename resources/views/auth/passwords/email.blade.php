@extends('auth.no-login-button')

@section('body')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 py-5">
        <div class="custom-bdr-3d p-4">
          <h5 class="text-center shadow-title p-4"><I>幾歲了還在忘記密碼啦（？</I></h5>
          <div class="">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <form class="custom-form" method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="p-4">
                <label for="email" class="text-center py-3">快去信箱收信 👇</label>
                <input id="email" type="email" class="text-center m-0 @error('email') is-invalid @enderror" name="email" style="width: 100%" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your E-mail">
              </div>

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror

              <div class="p-4">
                <button type="submit" class="btn">
                  寄出密碼重設信
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
