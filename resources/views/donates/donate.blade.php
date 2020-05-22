@extends('auth.login-button')
@section('body')
<div class="row justify-content-center">
  <div class="col-12 col-md-6">
    <h4>說明一下吼</h4>
    {{-- No --}}
    {{-- <div class="col-12 no-login">
      <a class="btn btn-5" href="/donate/{{$id}}"><span>我&emsp;不&emsp;要&emsp;</span></a>
    </div> --}}
    <div class="c-box">
      <div class="card custom-card">
        <div class="card-header">Donate Projects~</div>
        <div class="card-body">
          <form method="POST" action="{{ route('donates.new', $project_info['id']) }}" name="donation">
            @csrf
            name
            <input type="hidden" name="project_id" value = "{{ $project_info['id'] }}">
            <input type="hidden" name="user_id" value = "{{ auth()->user()['id'] }}">
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value = "{{ auth()->user()['name'] }}" >
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            amount
            <input class="form-control @error('amount') is-invalid @enderror" type="integer" name="amount">
            @error('amount')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            email
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ auth()->user()['email'] }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            comment
            <input class="form-control" type="text" name="comment">
            <input class="btn btn-5" type="submit" value="send">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection