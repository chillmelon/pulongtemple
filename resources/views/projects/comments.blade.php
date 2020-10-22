@extends("projects.min-summary")
@section("comments-active")
active
@endsection
@section("sub-content")
<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
      <!-- comment -->
      <div class="cmt-all">
        @foreach($randFive as $comment)
        <div class="cmt">
          <img class="cmt-img" src="{{asset('storage/'.$comment[ 'avatar' ])}}">
          <div class="cmt-content">
            <a class="usr-name">{{ $comment[ 'name' ] }}</a><br>{{ $comment[ 'comment' ] }}
          </div>
        </div>
        <hr class="hr-prime">
        @endforeach
      </div>
      <!-- user gallery -->
      <div class="gallery">
        @foreach($gallary as $icon)
        <div class="p-2" style="display: inline-block"><img class="usr-img" src="{{asset('storage/'.$icon[ 'avatar' ])}}"></div>
        @endforeach
      </div>
    </div>
    {{-- rank --}}
    <div class="col-12 col-lg-4">
      @foreach($topFive as $donater)
      <div class="rank custom-bdr-3d p-3 mt-2">
        <h4 class="select-title pl-2"><I>{{$loop->index+1}}</I></h4>
        {{-- <div><img class="usr-img" src="{{asset('storage/'.$donater[ 'avatar' ])}}"><span class="p-2">{{$donater[ 'name' ]}}</span class="p-2"></div> --}}
        <h6 class="pr-3">NT$ {{$donater[ 'amount' ]}}</h6>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection