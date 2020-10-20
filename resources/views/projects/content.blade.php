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
          <b>{{ $project->title }}</b>
        </h3>
        <h6>提案人：{{ $project->user->name }}</h6>
        <hr class="hr-prime">
      </div>
      <!-- project-status -->
      <div class="row py-3">
        <div class="col-6">
          <div class="project-status d-flex">
            <h5>NT$</h5>
            <h5>{{ $project->amount }}</h5>
          </div>
          <div class="project-status d-flex">
            <small>目標</small>
            <small>{{ $project->goal }}</small>
          </div>
          <hr class="hr-prime">
          <div class="project-status d-flex">
            <span>贊助人數</span>
            <span>{{ $project->supporters }} 人</span>
          </div>
          <div class="project-status d-flex">
            {{-- project completed --}}
            @if ($project->days_left < 0)
            <span>&nbsp;</span>
            <span>專案結束</span>
            @else
            {{-- project in progress --}}
            <span>剩餘天數</span>
            <span>{{ $project->days_left }} 天</span>
            @endif
          </div>
        </div>
        <!-- Progress Circle -->
        <div class="col-6">
          <div class="circle-pg-box ab-center">
            <div class="circle-pg">
              <div class="circle-pg-inner">
                <div class="percent">{{ $project->progress }}%</div>
                <div class="water" data-percent="{{ $project->progress }}"></div>
                <div class="glare"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="hr-prime">
      <!-- description -->
      <div class="description pt-2 pb-3">
        <p class="m-0">
          {{ $project->summary }}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
{{-- nav-mid --}}
@section("content-active")
active
@endsection
{{-- bottom-content --}}
@section("sub-content")
<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
      <div class="project-content">
        {!!$project->content!!}
      </div>
      <div class="expand-project">
        <div class="btn">▼        展開內容        ▼</div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="serif-tc custom-bdr hover-bdr p-4 mb-4" onclick="location.href='/donate/{{ $project->id }}'">
        <h4 class="select-title"><I>純贊助，別無所求。</I></h4>
        <div class="ff-2P pt-2">NT$ ???</div>
        <div class="pt-2">已被贊助 {{$project->supporters}} 次</div>
      </div>
			@foreach($project->options->sortByDesc('order') as $option)
      <div class="serif-tc custom-bdr hover-bdr p-4 mb-4" onclick="location.href='/donate/option/{{ $option->id }}'">
        <h4 class="select-title"><I>{{ $option->title }}</I></h4>
        <div class="ff-2P pt-2">NT$ {{$option->price}}</div>
        <div class="pt-2">已被贊助 {{$option->sold}} 次</div>
        <div class="pt-3">{{$option->content}}</div>
      </div>
			@endforeach
    </div>
  </div>
</div>
<script type="text/javascript">
  // on page load...
  porgressCircle();
  // on browser resize...
  $(window).resize(function () {
    porgressCircle();
  });
  // // Expand project content
  $(".expand-project").click(function () {
    $(".project-content").css("max-height", "none");
    $(".expand-project").hide();
  });
</script>
@endsection
