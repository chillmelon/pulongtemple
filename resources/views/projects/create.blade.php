@extends('layout')
@section('mainContent')
	<h2>Create Projects</h2>
	<form method="POST" action="{{ route('projects.store') }}">
		@csrf
		title
		<input type="text" name="title">
		content
		<input type="text" name="content">
		<input type="submit" value="send">
		<a href="{{ url('/projects') }}">projects</a>
	</form>
@endsection