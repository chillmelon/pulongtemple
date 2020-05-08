@extends('layout')
@section('mainContent')
	<h1>List Projects</h1>
	@foreach($projects as $project)
	<div class="project">
		<h3><a href="projects/{{ $project->id }}">{{$project->title}}</a></h3>
		<img src="/storage/{{ $project->image }}">
		<a>{{ $project->content }}</a>
		<a>{{ $project->total_amount/$project->goal }}</a>
	</div>
	@endforeach
@endsection