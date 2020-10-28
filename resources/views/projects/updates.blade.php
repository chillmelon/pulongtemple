@extends("projects.min-summary")

@section("updates-active")
active
@endsection

@section("sub-content")
<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
      @if($project->updates->count()==0)
        <div class="pt-5 text-center thd-color">
          <h5>本專案尚無更新，請靜候佳音。</h5>
        </div>
      @else
        @foreach($project->updates as $update)
          <div class="custom-bdr p-3 mb-4">
            <h4>{{$update->title}}</h4>
            <span>{{$update->created_at}}</span>
            <div class="update-content py-4">
              {!!$update->content!!}
            </div>
            <div class="more-btn ml-auto">
              <a class="btn" href="/updates/{{$update->id}}">更多內容...</a>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</div>
@endsection