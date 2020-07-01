@extends("projects.min-summary")

@section("updates-active")
active
@endsection

@section("sub-content")
<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
      @foreach($project->updates as $update)
      <div class="update custom-bdr">
        <h4>{{$update->title}}</h4>
        <span>{{$update->created_at}}</span>
        <div class="update-content">
          {!!$update->content!!}
        </div>
        <div class="more-btn">
          <a class="btn" href="/updates/{{$update->id}}">更多內容...</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection