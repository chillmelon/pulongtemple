@extends('donates.donate')

@section('donate-content')
<div class="col-lg-8">
  <div class="row">
    <div class="col-lg-6">
      <div class="custom-bdr-3d custom-bdr-3d-hover" onclick="location.href='/donate/{{$project_info->id}}'">
        <div class="serif-tc p-4">
          <h3 class="shadow-title"><I> 純贊助 </I></h3>
          <div class="ff-2P pt-2">NT$ ???</div>
          <div class="pt-2">已被贊助 {{$project_info->donors}} 次</div>
          <div class="select-content"><span>隨喜樂捐，不求回報。</span></div>
        </div>
      </div>
    </div>
    @foreach($project_info->options->sortByDesc('order') as  $option)
    <div class="col-lg-6">
      <div class="custom-bdr-3d custom-bdr-3d-hover" onclick="location.href='/donate/option/{{$option->id}}'">
        <div class="serif-tc p-4">
          <h3 class="shadow-title"><I> {{$option->title}} </I></h3>
          <div class="ff-2P pt-2">NT$ {{$option->price}}</div>
          <div class="pt-2">已被贊助 {{$option->sold}} 次</div>
          <div class="select-content"><span>{{$option->content}}</span></div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection


