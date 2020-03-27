@extends('layout')
@section('mainContent')
	<h1>List Projects</h1>
	@foreach($projects as $project)
	<div>
		<h3><a href="projects/{{ $project->id }}">{{$project->title}}</a></h3>
		<a>{{$project->content}}</a>
	</div>
	@endforeach
@endsection