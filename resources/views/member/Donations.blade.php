@extends("auth.login-button")
@section("body")
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="donation col-md-10 col-xl-6">
      <h3>My Donation</h3>
      <table>
      <tr>
      	<td class="d_id">交易單號</td>
      	<td class="d_project">贊助專案</td>
      	<td class="d_amount">金額</td>
      	<td class="d_time">時間</td>
      </tr>
      @foreach($donates as $donation)
      <tr>
      	<td>{{ $donation->uuid }}</td>
      	<td><a class="btn" href="/projects/{{ $donation->project->id }}">{{ $donation->project->title }}</a></td>
      	<td>{{ $donation->amount }}</td>
      	<td>{{ $donation->created_at }}</td>
      </tr>
      @endforeach
      </table>
    </div>
  </div>
</div>
@endsection