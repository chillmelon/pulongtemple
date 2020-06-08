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
        埔隆宮<span style="font-family: serif;"> - </span>炭烤土司大王
        <br>
        </h3>
        <h6 style="font-size: 12px;">by Pulong Temple</h6>
        <hr class="hr-prime">
      </div>
      <!-- status -->
      <div class="row status">
        <!-- goal -->
        <div class="goal col-6 col-sm-8 col-lg-6">
          <h4>NT${{ $project->total_amount }}</h4>
          <p style="font-size: 12px;">目標 NT{{ $project->goal }}</p>
          <hr class="hr-prime">
          <h4>{{ $project->supporters }}<small> 人贊助</small></h4>
          <hr class="hr-prime">
          <h4>{{ $project->days_left }}<small> 天剩餘</small></h4>
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
  @endsection
