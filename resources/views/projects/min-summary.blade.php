@extends("projects.project")

@section("meta")
<meta itemprop="name" content="{{ $project->title }}">
<meta itemprop="image" content="{{asset('/storage/'. $project->image)}}">
<meta itemprop="description" content="{{ $project->summary }}">
{{-- facebook --}}
<meta property="og:title" content="{{ $project->title }}" >
{{-- <meta property="og:url" content="https://pulongtemple.wtf/projects/5"> --}}
<meta property="og:image" content="url('{{asset('/storage/'. $project->image)}}')">
<meta property="og:description" content="{{ $project->summary }}" >
@endsection

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
        <h3 class="serif-tc">
        {{ $project->title }}
        </h3>
        <h6> by {{ $project->user->name }}</h6>
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
          <div class="max-w-200">
            @if ($project->days_left < 0)
            <h4 class="inlin-b">&nbsp;</h4>
            <span class="inlin-b ab-rb">專案結束</span>
            @else
            <h4 class="inlin-b">{{ $project->days_left }}</h4>
            <span class="inlin-b ab-rb">天剩餘</span>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection