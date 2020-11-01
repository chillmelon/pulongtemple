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
    <div class="shadow-title text-center pt-2 my-lg-4">
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
  <nav id="navs" class="navbar navbar-expand navbar-dark sticky-top nav-mid">
    <div class="pages">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="active nav-link">專案內容</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">留言</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">更新</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">常見問答</a>
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
  <div id="subPage">

    {{-- Project Content Page --}}
    <div class="container-fluid">
      <div class="current bottom-content">
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
      </div>
    </div>

    {{-- Comment Page --}}
    <div class="container-fluid">
      <div class="bottom-content">
        <div class='row'>
          <div class='col-12 col-lg-8 order-1 order-lg-0 mt-lg-5'>
            @if ($comments->count()==0)
              <div class="pt-5 text-center thd-color">
                <h5>尚無留言，等候您的垂青。  </h5>
              </div>
            @else
              @foreach($comments as $comment)
                <div class="comment pb-3">
                  <div class="usr-img-box d-inline-block">
                    {{-- img --}}
                    <img src="{{asset('storage/'.$comment->user->avatar)}}">
                  </div>
                  <div class= "comment-in d-inline-block pl-3 pt-1">
                    {{-- name --}}
                    <h6 class=""><b>{{ $comment->name }}</b></h5>
                    {{-- content --}}
                    <p class="pt-1">{{ $comment->comment }}</p>
                  </div>
                  <div>
                    <hr class="hr-prime">
                  </div>
                </div>
              @endforeach
            @endif
            {{-- user gallery --}}
            <div class="gallery py-4">
              @foreach($project->donates as $donation)
                <div class="p-2" style="display: inline-block"><img src="{{asset('storage/'.$donation->user->avatar)}}"></div>
              @endforeach
            </div>
          </div>
          {{-- rank --}}
          <div class="col-12 col-lg-4 order-0 order-lg-1 pb-5 mt-5">
            @foreach($topFive as $donor)
              <div class="rank d-flex custom-bdr-3d p-3 mt-2">
                <h5 class="shadow-title pr-2 my-auto"><I>{{$loop->index+1}}.</I></h5>
                <div class="d-flex">
                  {{-- img --}}
                  <img class="ml-2 my-auto" src="{{asset('storage/'.$donor[ 'avatar' ])}}">
                  {{-- name --}}
                  <div class="usr-name ml-3 my-auto">{{$donor[ 'name' ]}}</div>
                </div>
                {{-- amount --}}
                <div class="text-nowrap my-auto ml-auto"><b>NT$ {{$donor[ 'amount' ]}}</b></div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    {{-- Update Page --}}
    <div class="container-fluid">
      <div class="bottom-content">
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
      </div>
    </div>

    {{-- FAQ page --}}
    <div class="container-fluid">
      <div class="bottom-content">
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
    </div>

  </div>


  {{-- PageSwitch --}}
  <script src="{{ asset('/js/pageSwitch.js') }}"></script>
  <script>

    var pw = new pageSwitch('subPage', {

      // duration of animation
      duration: 600,

      // 1 = vertical, 0 = horizontal
      direction: 0,

      // initial page
      start: 0,

      // infinite loop
      loop: false,

      // easing function: linear ease ease-in ease-out ease-in-out bounce
      ease: 'ease-in-out',

      // transition effect
      transition: 'flip3d',

      // freeze the page when transitioning
      freeze: false,

      // enable mouse drag
      mouse: true,

      // enable mouse wheel
      mousewheel: false,

      // enable keyboard arrows
      arrowkey: false,

      // enable autoplay
      autoplay: false,

      // autoplay interval
      interval: 5000

    });



    //
    // Custom

    navs = document.getElementById('navs').getElementsByTagName('a');
    // nav active
    pw.on('before', function (m, n) {
      navs[m].className = 'nav-link';
      navs[n].className = 'active nav-link';
    });
    // nav click
    i = 0;
    for (; i < navs.length; i++) {
      !(function (i) {
        navs[i].onclick = function () {
          pw.slide(i);
        };
      })(i);
    }

    // Reset subPage Height
    function resetHeight(animate) {
      // get height of current subPage content
      let divHeight = $('.current').outerHeight(true);
      if (animate == 1) {
        $('#subPage').animate({
          height: divHeight
        }), 600;
      } else {
        $('#subPage').height(divHeight);
      }
    }

    // Reset MarginTop of footer
    function resetMT(animate) {
      // get height of current subPage content
      let divHeight = $('.current').outerHeight(true);
      if (animate == 1) {
        $('footer').animate({
          marginTop: divHeight
        }), 600;
      } else {
        $('footer').css('margin-top', divHeight);
      }
    }

    // on page load
    $(function() {
      // resetHeight();
      resetMT();
      
      // Remove footer in outer.blade
      // $('footer').remove();
    });

    pages = document.getElementById('subPage').getElementsByClassName('bottom-content');
    // Current Class
    pw.on('before', function (m, n) {
      pages[m].className = 'bottom-content';
      pages[n].className = 'current bottom-content';
    });

    // pw.on('after', function () {
      // resetHeight();
    // });

    pw.on('before', function () {
      resetMT(1);
      // resetHeight();
    });


  </script>


  {{-- Progress Circle --}}
  <script type="text/javascript">
    // on page load...
    porgressCircle();
    // on browser resize...
    $(window).resize(function () {
      porgressCircle();
      // resetHeight();
      resetMT();
    });

    // Expand project content
    $(".expand-project").click(function () {
      $(".project-content").css("height", "auto");
      // resetHeight();
      resetMT();
      $(".expand-project").hide();
    });
  </script>

@endsection