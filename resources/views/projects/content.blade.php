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
        <h3 class="serif-tc">
        {{ $project->title }}
        <br>
        </h3>
        <h6> by {{ $project->user->name }}</h6>
        <hr class="hr-prime">
      </div>
      <!-- status -->
      <div class="row status">
        <!-- goal -->
        <div class="goal ff-2P col-6 col-sm-8 col-lg-6">
          <div class="max-w-200">
            <sapn class="fs-18 inline-b">NT$</sapn>
            <sapn class="fs-18 inline-b ab-rb">{{ $project->amount }}</sapn>
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
        <!-- Progress Circle -->
        <div class="col-6 col-sm-4 col-lg-6">
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
      <!-- description -->
      <div class="description">
        <p>
          {{ $project->summary }}
        </p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
// on page load...
porgressCircle();
// on browser resize...
$(window).resize(function() {
  porgressCircle();
});
</script>
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
    <div class="col-12 col-lg-4">
			@foreach($project->options as $option)
      <div class="project-meal custom-bdr hover-bdr pd-12 mb24" onclick="location.href='/donate/option/{{ $option->id }}'">
        <img src="/image/meal.jpg" alt="">
        <div class="ff-2P pt8">
          NT$ {{$option->price}}
        </div>
        <div class="pt8">
					已被贊助 {{$option->sold}} 次
        </div>
        <div>
					{{$option->features}}

					{{-- <a class="btn wave-btn" href=""><span>贊 助 $</span></a> --}}
          {{--【北風北 最後優惠】<br>--}}
          {{--∎ 未來市價 $3088，現省 $589 /晚鳥 81 折優惠<br>--}}

          {{--馬丘麻將精裝組 MACHILL PREMIUM x1<br>--}}
          {{--｜每組內含：<br>--}}
          {{--・馬丘麻將 x1<br>--}}
          {{--・方向環 x1<br>--}}
          {{--・5mm牌尺 x4<br>--}}
          {{--・骰子x6<br>--}}
          {{----------------<br>--}}
          {{--重要提醒：<br>--}}
          {{--＊台灣本島免運，外島與海外運費請參閱問答<br>--}}
          {{--＊共有三種配色，請於回饋調查選擇<br>--}}
          {{--＊如需開立統編，請填寫統一編號與抬頭於備註欄--}}
        </div>
      </div>
			@endforeach
    </div>
  </div>
</div>
@endsection
