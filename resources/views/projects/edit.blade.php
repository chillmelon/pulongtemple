@extends('layout')
@section('mainContent')
	<h2>Edit Projects</h2>
<form action="{{ route('projects.update', $project_info->id) }}" method="POST" name="update_project">
	@csrf
	@method('PUT')
		title
		<input type="text" name="title" value="{{ $project_info -> title }}">
		content
		<input type="text" name="content" value="{{ $project_info -> content }}">
		<input type="submit" value="send">
		<a href="{{ url('/projects') }}">projects</a>
	</form>
@endsection