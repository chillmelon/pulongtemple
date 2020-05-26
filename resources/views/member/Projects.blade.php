@extends("auth.login-button")
@section("body")
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="my_p col-md-10 col-xl-6">
      <h3>My Project</h3>
      <table>
        <tr>
          <td>專案名稱</td>
          <td>現在金額</td>
          <td>目標金額</td>
          <td>開始時間</td>
          <td>結束時間</td>
        </tr>
        @foreach($projects as $project)
        <tr>
          <td><a class="btn btn-5" href="/projects/{{ $project->id }}">{{ $project->title }}</a></td>
          <td>{{ $project->total_amount }}</td>
          <td>{{ $project->goal }}</td>
          <td>{{ $project->created_at }}</td>
          <td>{{ $project->deadline }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection