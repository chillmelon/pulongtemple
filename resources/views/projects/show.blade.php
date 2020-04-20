@extends('layout')
@section('mainContent')
	<h1>Show Projects</h1>
	<p>
		{{ $project_info -> content }}
	</p>
	<a href="/donate/{{ $project_info -> id }}">Donate Project</a>
@endsection