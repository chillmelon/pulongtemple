@extends('donates.donate')

@section('selected')
<div class="custom-bdr-dark-3d">
  <div class="serif-tc p-4">
    <h3 class="shadow-title"><I> 純贊助 </I></h3>
    <div class="ff-2P pt-2">NT$ ???</div>
    <div class="pt-2">已被贊助 {{$project_info->donors}} 次</div>
    <div class="select-content"><span>隨喜樂捐，不求回報。</span></div>
  </div>
</div>
@endsection

@section('donate-content')
<div class="col-lg-6">
  <div class="custom-form">
    <div class="">
      <div class="">
        <form method="POST" action="{{ route('donates.new', $project_info->id) }}" name="donation">
          @csrf
          {{--  --}}
          <label for="amount" class="custom-bdr-dark-3d">
            <div class="form-title">贊助金額</div>
            <input id="amount" class="mb-2 @error('amount') is-invalid @enderror"
              value="100" type="number" name="amount">
            <div class="amount-area ml-2 pb-2 d-flex justify-content-end flex-wrap">
              {{-- <div id="increase" class="btn">▴加100</div> --}}
              {{-- <div id="decrease" class="btn">▾ 減100</div> --}}
              <div>
                <div id="marlboro" class="btn">▴加一包菸</div>
                <div id="cabbage" class="btn">▴加顆白菜</div>
              </div>
              <div>
                <div id="happy" class="btn">▴不用找了</div>
                <div id="lowest" class="btn">▾最低金額</div>
              </div>
            </div>
            @error('amount')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </label>
          {{--  --}}
          <label for="d-name" class="custom-bdr-dark-3d">
            <div class="form-title">贊助人</div>
            <input type="hidden" name="project_id" value = "{{ $project_info->id }}">
            <input type="hidden" name="user_id" value = "{{ auth()->user()['id'] }}">
            @auth
              <input id="d-name" class="@error('name') is-invalid @enderror" type="text" name="name" value = "{{ auth()->user()['name'] }}">
            @else
              <input id="d-name" class="@error('name') is-invalid @enderror" type="text" name="name">
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            @endauth
          </label>
          {{--  --}}
          <label for="topic" class="custom-bdr-dark-3d">
            <div class="form-title">留言(選填)</div>
            <textarea id="topic" class="@error('comment') is-invalid @enderror" type="text" name="comment"></textarea>
            @error('comment')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </label>
          {{-- e-mail --}}
          @auth
            <input class="form-control @error('email') is-invalid @enderror" type="hidden" name="email" value="{{ auth()->user()['email'] }}">
          @endauth
          {{-- btn --}}
          <div class="custom-bdr-3d custom-bdr-3d-hover">
            <button class="btn">去付款</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection