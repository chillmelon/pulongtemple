@extends("auth.login-button")
@section("body")
<div class="container-fluid">
  <div class="row justify-content-center pt-5">
    <div class="col-md-6 col-xl-4">
      <h3 class="ff-2P text-center">My Donations</h3>
      @foreach($donates as $donation)
      <div class="history custom-bdr-3d">
        <div class="d-flex pt-3 pr-3">
          <a class="no-bdr btn pl-3" href="/projects/{{ $donation->project->id }}">
            <h5>{{ $donation->project->title }}</h5>
          </a>
          <div style=""><small>{{ $donation->created_at }}</small></div>
        </div>
        <div class="d-flex pt-2 pr-4">
          @if($donation->option)
          <div class="pl-3 plan">{{$donation->option->title}}</div>
          @else
          <div class="pl-3 plan"></div>
          @endif
          <div class="ff-2P">NT${{ $donation->amount }}</div>
        </div>
        <div class="p-3"><small>交易單號：{{ $donation->uuid }}</small></div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
