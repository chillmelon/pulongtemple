@extends("auth.login-button")
@section("body")
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="donation col-md-10 col-xl-6">
      <h3>My Donation</h3>
      @foreach($donates as $donation)
      <div class="p-card-box">
      	<div class="p-card custom-bdr">
      		<div class="p-card-head">
      			{{ $donation->created_at }}
      		</div>
      		<div class="p-card-body">
      			<a class="btn my-donate" href="/projects/{{ $donation->project->id }}">{{ $donation->project->title }}</a>
      			<div class="p-card-nt">NT${{ $donation->amount }}</div>
      		</div>
      		<div class="p-card-footer">交易單號:{{ $donation->uuid }}</div>
      	</div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection