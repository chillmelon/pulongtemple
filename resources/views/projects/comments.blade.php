@extends("projects.min-summary")
@section("comments-active")
active
@endsection
@section("sub-content")
<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8 order-1 order-lg-0'>
      <!-- comment -->
      <div class="cmt-all">
        @foreach($randFive as $comment)
        <div class="cmt pb-4">
          <img class="cmt-img" src="{{asset('storage/'.$comment[ 'avatar' ])}}">
          <div class="cmt-content">
            <a class="usr-name">{{ $comment[ 'name' ] }}</a><br>{{ $comment[ 'comment' ] }}
          </div>
        </div>
        <hr class="hr-prime">
        @endforeach
      </div>
      <!-- user gallery -->
      <div class="gallery pb-4">
        @foreach($gallary as $icon)
        <div class="p-2" style="display: inline-block"><img class="usr-img" src="{{asset('storage/'.$icon[ 'avatar' ])}}"></div>
        @endforeach
      </div>
    </div>
    {{-- rank --}}
    <div class="col-12 col-lg-4 order-0 order-lg-1">
      @foreach($topFive as $donater)
      <div class="rank d-flex custom-bdr-3d p-3 mt-2">
        <h5 class="select-title pr-2 my-auto"><I>{{$loop->index+1}}.</I></h5>
        <div class="d-flex">
          <img class="my-auto" src="{{asset('storage/'.$donater[ 'avatar' ])}}">
          <div class="p-2 my-auto">{{$donater[ 'name' ]}}</div>
        </div>
        <div class="text-nowrap my-auto ml-auto"><b>NT$ {{$donater[ 'amount' ]}}</b></div>
      </div>
      {{-- <div class="rank custom-bdr-3d p-3 mt-2">
        <h5 class="select-title pr-2"><I>{{$loop->index+1}}.</I></h5>
        <div class="">
          <img class="my-auto" src="{{asset('storage/'.$donater[ 'avatar' ])}}">
          <div class="uname p-2">{{$donater[ 'name' ]}}</div>
        </div>
        <div class="amount text-nowrap"><b>NT$ {{$donater[ 'amount' ]}}</b></div>
      </div> --}}
      @endforeach
    </div>
  </div>
</div>
@endsection