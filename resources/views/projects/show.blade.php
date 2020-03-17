@extends('layout')
@section('mainContent')
	<h1>Show Projects</h1>
	<p>
		{{ $project_info -> content }}
	</p>
	<a href="{{ $project_info -> id }}/edit">Edit Project</a>
	<form action="{{ route('projects.destroy', $project_info->id)}}" method="post">
		@csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection