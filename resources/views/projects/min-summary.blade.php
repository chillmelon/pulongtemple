@extends("projects.project")
@section("summary")
{{-- min-summary --}}
<div class="container-fluid top-content">
  <div class="row top-img">
    <!-- image_main -->
    <div class="imgbox img-main img-min col-sm-6 col-md-6 col-lg-6 ">
      <div class="imgbox-inner">
        <div class="image" style="background-image: url('{{asset('image/pulongTemple.png')}}');"></div>
      </div>
    </div>
    <!-- intro -->
    <div class="intro col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 ">
      <!-- title -->
      <div class="title">
        <h4>
        埔隆宮<span style="font-family: serif;"> - </span>炭烤土司大王
        </h4>
        <h6 style="font-size: 14px;"> by Pulong Temple</h6>
        <hr class="hr-prime">
      </div>
      <!-- status -->
      <div class="row status">
        <!-- goal -->
        <div class="goal col-6 col-sm-8 col-lg-6">
			<h5><b>NT${{ $project->total_amount }}</b></h5>
			<small>目標 NT${{ $project->goal }}</small>
          <hr class="hr-prime">
		  <h5>{{ $project->supporters }} <small>人贊助</small></h5>
          <hr class="hr-prime" class="new" color="#8C8C8C">
		  <h5>{{ $project->days_left }} <small>天剩餘</small></h5>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection
