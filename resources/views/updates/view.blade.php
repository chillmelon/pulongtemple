@extends("projects.min-summary")

@section("sub-content")
<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
      <h3>{{$update->title}}</h3>
      <div>
        <span>{{$update->created_at}}</span>
      </div>
      <div class="update-content py-4">
		  {!!$update->content!!}
      </div>
    </div>
  </div>
</div>
@endsection
