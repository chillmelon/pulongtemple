@extends('layout')
@section('mainContent')
	<h1>List Projects</h1>
	<table class="table-striped">
		<thead>
			<tr>
				<th>Title</th>
			</tr>
		</thead>
		<tbody>
			@foreach($projects as $project)
			<tr>
				<td><a href="projects/{{ $project->id }}">{{$project->title}}</a>
				</td>
			</tr>
			@endforeach
		</tbody>
		<td><a href="{{ url('projects/create') }}">create</a>
		</td>
	</table>
@endsection