@extends("projects.min-summary")


{{-- @section("updates-active")
active
@endsection
@section("updates-current")
<span class="sr-only">(current)</span>
@endsection --}}

@section("sub-content")

<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
      <h3 class='f4 b mv0'>
		  {{$update->title}}
      </h3>
      <div class='f7 b mb3 mt1'>
        <span class='mr3'>2020/05/15 18:55</span>
        <div class='nowrap dib'>
        </div>
      </div>
      <div class='mt-child-0 nested-media lh-copy f-17 overflow-hidden'>
		  {!! $update->content !!}
      </div>
    </div>
  </div>
</div>

@endsection
