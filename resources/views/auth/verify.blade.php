@extends("auth.no-login-button")
@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 c-box">
      <div class="card custom-card">
        <div class="card-header">E-mail 認證中...</div>
        <div class="card-body">
          @if (session('resent'))
          <div class=".answer">
            新的一封認證信已寄出。
          </div>
          @endif
          <h4>
          認證信已經寄到您的信箱。
          </h4>
          如果沒收到的話 👇
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-5">要求新的一封認證信</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection