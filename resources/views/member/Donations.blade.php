@extends("auth.login-button")
@section("body")
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="donation col-md-10 col-xl-6">
      <h3 class="ff-2P">My Donation</h3>
      @foreach($donates as $donation)
      <div class="p-card-box">
      	<div class="p-card custom-bdr">
      		<div class="p-card-head">
      			{{ $donation->created_at }}
      		</div>
      		<div class="p-card-body custom-bdr-bm">
      			<a class="btn my-donate" href="/projects/{{ $donation->project->id }}">{{ $donation->project->title }}</a>
      			<div class="p-card-nt ff-2P fs-12">NT$ {{ $donation->amount }}</div>
      		</div>
      		<div class="p-card-footer"><span>交易單號：{{ $donation->uuid }}</span></div>
      	</div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection