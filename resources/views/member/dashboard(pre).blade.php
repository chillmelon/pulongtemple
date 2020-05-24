@extends("auth.login-button")
@section("body")
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8 col-xl-6">
      <div class="">
        <a class="btn btn-5" href="/member/donations">我的贊助</a>
        <a class="btn btn-5" href="/member/projects">我的專案</a>
        <a class="btn btn-5" href="/member/profile">修改個人檔案</a>
      </div>
    </div>
  </div>
</div>
@endsection