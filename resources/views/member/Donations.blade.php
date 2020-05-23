@extends("auth.login-button")
@section("body")
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10 col-xl-6" style="padding-top: 32px;">
      <h1>我的贊助</h1>
      <table>
      <tr>
      	<td>交易單號</td>
      	<td>贊助專案</td>
      	<td>金額</td>
      	<td>留言</td>
      	<td>時間</td>
      </tr>
      @foreach($donates as $donation)
      <tr>
      	<td>{{ $donation->uuid }}</td>
      	<td><a href="/projects/{{ $donation->project->id }}">{{ $donation->project->title }}</a></td>
      	<td>{{ $donation->amount }}</td>
      	<td>{{ $donation->comment }}</td>
      	<td>{{ $donation->created_at }}</td>
      </tr>
      @endforeach
      </table>
    </div>
  </div>
</div>
@endsection