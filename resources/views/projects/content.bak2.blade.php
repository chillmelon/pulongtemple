@extends("auth.login-button")

{{-- Meta --}}
@section("meta")
  <meta itemprop="name" content="{{ $project->title }}">
  <meta itemprop="image" content="{{asset('/storage/'. $project->image)}}">
  <meta itemprop="description" content="{{ $project->summary }}">
  {{-- facebook --}}
  <meta property="og:title" content="{{ $project->title }}" >
  {{-- <meta property="og:url" content="https://pulongtemple.wtf/projects/5"> --}}

  {{-- temporary --}}
  {{-- <meta property="og:image" content="{{asset('/storage/'. $project->image)}}"> --}}
  <meta property="og:image" content="https://pulongtemple.wtf/storage/projects/October2020/real.png">

  <meta property="og:description" content="{{ $project->summary }}" >
@endsection

@section("body")
  {{--判斷是否曾贊助過--}}
  @if($project->donated)
    <div class="shadow-title text-center pt-2 pt-lg-5">
      <h5><I>您是這個專案的贊助者，感謝您！</I></h5>
    </div>
  @endif

  {{-- Top Content --}}
  <div class="container-fluid">
    <div class="row top-content">
      <!-- image_main -->
      <div class="imgbox img-main col-sm-12 col-lg-8">
        <div class="imgbox-inner">
          <div class="image" style="background-image: url('{{asset('/storage/'. $project->image)}}');"></div>
        </div>
      </div>
      <!-- intro -->
      <div class="col-sm-12 col-lg-4 p-3">
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
              <h6>贊助者</h6>
              <h5>{{ $project->supporters }}<span> </span>人</h5>
            </div>
            <div class="project-status d-flex">
              {{-- project completed --}}
              @if ($project->days_left < 0)
              <h6>&nbsp;</h6>
              <h6>專案結束</h6>
              @else
              {{-- project in progress --}}
              <h6>募資倒數</h6>
              <h5>{{ $project->days_left }}<span> </span>天</h5>
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
            <b>{{ $project->summary }}</b>
          </p>
        </div>
      </div>
    </div>
  </div>

  {{-- medium navbar --}}
  <nav class="navbar navbar-expand navbar-dark sticky-top nav-mid">
    <div class="pages">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link @yield('content-active')" href="/projects/{{ $project->id }}">專案內容</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @yield('comments-active')" href="/projects/{{ $project->id }}/comments">留言</a>
        </li>
        <li class="nav-item">
        <a class="nav-link @yield('updates-active')" href="/projects/{{ $project->id }}/updates">更新</a>
        </li>
        <li class="nav-item">
        <a class="nav-link @yield('faq-active')" href="/projects/{{ $project->id }}/faq">常見問答</a>
        </li>
      </ul>
    </div>
    {{-- donate button --}}
    <div class="donate">
    @if ($project->days_left < 0)
      <a class="btn"><span>專案結束</span></a>
    @elseif($project->donated)
      <a class="btn wave-btn" href="/donate/select/{{ $project->id }}"><span>再次贊助 $</span></a>
    @else
    <a class="btn wave-btn" href="/donate/select/{{ $project->id }}"><span>贊 助 $</span></a>
    @endif
    </div>
  </nav>

  {{-- Sub Content --}}
  <div class="container-fluid bottom-content">

    {{-- Project Content Page --}}
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
        <div class="custom-bdr-3d custom-bdr-3d-hover" onclick="location.href='/donate/{{$project->id}}'">
          <div class="serif-tc p-4">
            <h3 class="shadow-title"><I> 純贊助 </I></h3>
            <div class="ff-2P pt-2">NT$ ???</div>
            <div class="pt-2">已被贊助 {{$project->donors}} 次</div>
            <div class="select-content"><span>隨喜樂捐，不求回報。</span></div>
          </div>
        </div>
        @foreach($project->options->sortByDesc('order') as $option)
        <div class="custom-bdr-3d custom-bdr-3d-hover" onclick="location.href='/donate/option/{{$option->id}}'">
          <div class="serif-tc p-4">
            <h3 class="shadow-title"><I> {{$option->title}} </I></h3>
            <div class="ff-2P pt-2">NT$ {{$option->price}}</div>
            <div class="pt-2">已被贊助 {{$option->sold}} 次</div>
            <div class="select-content"><span>{{$option->content}}</span></div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    {{-- Comment Page --}}
    <div class='row'>
      <div class='col-12 col-lg-8 order-1 order-lg-0'>
        @if ($randFive->count()==0)
          <div class="pt-5 text-center thd-color">
            <h5>尚無留言，等候您的垂青。  </h5>
          </div>
        @else
          @foreach($randFive as $comment)
            <div class="comment d-flex pb-3">
              <div class="usr-img-box">
                {{-- img --}}
                <img src="{{asset('storage/'.$comment[ 'avatar' ])}}">
              </div>
              <div class= "pl-3 pt-1">
                {{-- name --}}
                <h6 class=""><b>{{ $comment[ 'name' ] }}</b></h5>
                {{-- content --}}
                <p class="pt-1">{{ $comment[ 'comment' ] }}</p>
              </div>
              <div>
                <hr class="hr-prime">
              </div>
            </div>
          @endforeach
        @endif
        {{-- user gallery --}}
        <div class="gallery py-4">
          @foreach($gallary as $icon)
          <div class="p-2" style="display: inline-block"><img src="{{asset('storage/'.$icon[ 'avatar' ])}}"></div>
          @endforeach
        </div>
      </div>
      {{-- rank --}}
      <div class="col-12 col-lg-4 order-0 order-lg-1 pb-5">
        @foreach($topFive as $donater)
        <div class="rank d-flex custom-bdr-3d p-3 mt-2">
          <h5 class="shadow-title pr-2 my-auto"><I>{{$loop->index+1}}.</I></h5>
          <div class="d-flex">
            {{-- img --}}
            <img class="ml-2 my-auto" src="{{asset('storage/'.$donater[ 'avatar' ])}}">
            {{-- name --}}
            <div class="usr-name ml-3 my-auto">{{$donater[ 'name' ]}}</div>
          </div>
          {{-- amount --}}
          <div class="text-nowrap my-auto ml-auto"><b>NT$ {{$donater[ 'amount' ]}}</b></div>
        </div>
        @endforeach
      </div>
    </div>

    {{-- Update Page --}}
    <div class='row'>
      <div class='col-12 col-lg-8'>
        @if($project->updates->count()==0)
          <div class="pt-5 text-center thd-color">
            <h5>本專案尚無更新，請靜候佳音。</h5>
          </div>
        @else
          @foreach($project->updates as $update)
            <div class="custom-bdr-3d p-3 mb-4 p-lg-4">
              <h4>{{$update->title}}</h4>
              <span>{{$update->created_at}}</span>
              <div class="update-content py-3">
                {!!$update->content!!}
              </div>
              {{-- <div class="more-btn d-flex mt-3">
                <a class="btn ml-auto" href="/updates/{{$update->id}}">更多內容 ➤</a>
              </div> --}}
            </div>
          @endforeach
        @endif
      </div>
    </div>
    
    {{-- FAQ page --}}
    <div class='row'>
      <div class='col-12 col-lg-8'>
        @if ($project->faqs->count()==0)
          <div class="pt-5 text-center thd-color">
            <h5>本專案尚無問答，有任何疑惑請聯絡提案人！</h5>
          </div>
        @else
          @foreach($project->faqs as $faq)
            <div class="custom-bdr-3d p-3">
            <h4>Q{{$loop->index + 1}}. {{$faq->question}}</h4>
            <h6>更新於 {{$faq->updated_at}}</h6>
            <span class="answer">{{$faq->answer}}</span>
            </div>
          @endforeach
        @endif
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





{{-- @extends("projects.project") --}}



@section("summary")
  
@endsection
{{-- nav-mid --}}
@section("content-active")
active
@endsection
{{-- bottom-content --}}
@section("sub-content")

@endsection
