@extends("layouts.outer")

@section("login-button")
  <a class="btn" style="visibility: hidden;" href="#"></a>
@endsection
@section("body")
<div class="row justify-content-center">
  <div class="donate-form col-12 col-md-10 col-lg-8 col-xl-6">
    <div class="inform">
      <h4>說明一下吼</h4>
    </div>
    {{-- login --}}
    <div class="col-12 no-login">
      <a class="btn btn-5" href="{{ route('login') }}"><span>以會員身分贊助</span></a>
    </div>
    <div class="c-box">
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
            金額 $
            <input class="form-control @error('amount') is-invalid @enderror" type="integer" name="amount">
            @error('amount')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            E-mail
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
@endsection