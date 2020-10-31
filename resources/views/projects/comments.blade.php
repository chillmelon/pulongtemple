@extends("projects.min-summary")
@section("comments-active")
active
@endsection
@section("sub-content")
<div class="container-fluid bottom-content">
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
</div>
@endsection