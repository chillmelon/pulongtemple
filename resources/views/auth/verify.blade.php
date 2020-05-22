@extends("auth.no-login-button")
@section("body")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 c-box">
      <div class="card custom-card">
        <div class="card-header">E-mail 認證中...</div>
        <div class="card-body">
          @if (session('resent'))
          <div class="new-email">
            <h4>新的認證信已寄出。</h4>
          </div>
          @endif
          <h4>認證信已寄出，請去信箱中點擊認證連結。</h4>
          <br>
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