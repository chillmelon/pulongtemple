@extends('layout')
@section('mainContent')
<div class="title m-b-md">
	埔隆宮
</div>
<div class="flex-center position-ref">
	<table style="border: 1px solid black;">
	@foreach($projects as $project)
		<tr>
			<td><a href="projects/{{$project['id']}}">{{$project['title']}}</a></td>
			<td><img src="/storage/{{ $project['cover'] }}"></td>
			<td><a>{{ $project['progress'] }}</a></td>
		</tr>
	@endforeach
</table>
</div>
@endsection