@extends("auth.login-button")
@section("body")
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="my_p col-md-10 col-xl-6">
      <h3>My Project</h3>
      @foreach($projects as $project)
      <div class="p-card-box">
        <div class="p-card custom-bdr">
          <div class="p-card-head">
            <div>START: {{ $project->created_at }}</div>
            <div>UNTIL: {{ $project->deadline }}</div>
          </div>
          <div class="p-card-body">
            <a class="btn my-project" href="/projects/{{ $project->id }}">{{ $project->title }}</a>
            <div class="p-card-nt my-project-nt">NT${{ $project->total_amount }}<br>/{{ $project->goal }}</div>
          </div>
          {{-- <div class="p-card-footer"></div> --}}
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection