@extends('layout')
@section('mainContent')
	<div class="title m-b-md">
        埔隆宮
    </div>
	@foreach($projects as $project)
	<div class="project">
		<h3><a href="projects/{{ $project->id }}">{{$project->title}}</a></h3>
		{{-- <img src="/storage/{{ $project->image }}"> --}}
		<a>{{ $project->total_amount/$project->goal }}</a>
	</div>
	@endforeach
@endsection