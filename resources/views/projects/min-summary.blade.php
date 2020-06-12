@extends("projects.project")
@section("summary")
{{-- min-summary --}}
<div class="container-fluid top-content">
  <div class="row top-img">
    <!-- image_main -->
    <div class="imgbox img-main img-min col-sm-6 col-md-6 col-lg-6 ">
      <div class="imgbox-inner">
        <div class="image" style="background-image: url('{{asset('/storage/'. $project->image)}}');"></div>
      </div>
    </div>
    <!-- intro -->
    <div class="intro col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 ">
      <!-- title -->
      <div class="title">
        <h4>
        埔隆宮-炭烤土司大王
        </h4>
        <h6 style="font-size: 12px;"> by Pulong Temple</h6>
        <hr class="hr-prime">
      </div>
      <!-- status -->
      <div class="row status">
        <!-- goal -->
        <div class="goal ff-2P col-12">
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
          {{-- <hr class="hr-prime"> --}}
          <div class="max-w-200">
            <h4 class="inlin-b">{{ $project->days_left }}</h4>
            <span class="inlin-b ab-rb">天剩餘</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection