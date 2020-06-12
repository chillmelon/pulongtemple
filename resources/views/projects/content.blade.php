@extends("projects.project")
@section("summary")
<div class="container-fluid">
  <div class="row top-content">
    <!-- image_main -->
    <div class="imgbox img-main col-sm-12 col-lg-8">
      <div class="imgbox-inner">
        <div class="image" style="background-image: url('{{asset('/storage/'. $project->image)}}');"></div>
      </div>
    </div>
    <!-- intro -->
    <div class="intro col-sm-12 col-lg-4">
      <!-- title -->
      <div class="title">
        <h3>
        {{ $project->title }}
        <br>
        </h3>
        <h6 style="font-size: 12px;"> by {{ $project->user->name }}</h6>
        <hr class="hr-prime">
      </div>
      <!-- status -->
      <div class="row status">
        <!-- goal -->
        <div class="goal ff-2P col-6 col-sm-8 col-lg-6">
          <div class="max-w-200">
            <h4 class="inline-b">NT$</h4>
            <h4 class="inline-b ab-rb">{{ $project->amount }}</h4>
          </div>
          <div class="max-w-200">
            <span class="inline-b fs-12"></span>
            <span class="inline-b ab-rb fs-12">/{{ $project->goal }}</span>
          </div>
          <hr class="hr-prime">
          <div class="max-w-200">
            <h4 class="inlin-b">{{ $project->supporters }}</h4>
            <span class="inlin-b ab-rb">人贊助</span>
          </div>
          <div class="max-w-200">
            <h4 class="inlin-b">{{ $project->days_left }}</h4>
            <span class="inlin-b ab-rb">天剩餘</span>
          </div>
        </div>
        <!-- Progress bar -->
        <div class="col-6 col-sm-4 col-lg-6">
          <div class="circle-pg-box ab-center">
            <div class="circle-pg">
              <div class="circle-pg-inner">
                <div class="percent">{{ $project->progress }}%</div>
                <div class="water"></div>
                <div class="glare"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- description -->
      <div class="description">
        <p>
          {{ $project->summary }}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
@section("content-active")
active
@endsection
@section("sub-content")
<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
      <div class="project-content">
        {!!$project->content!!}
      </div>
    </div>
  </div>
</div>
@endsection