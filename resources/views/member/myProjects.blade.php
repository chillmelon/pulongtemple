@extends('layout')
@section('content')
<table>
<tr>
	<td>專案名稱</td>
	<td>現在金額</td>
	<td>目標金額</td>
	<td>開始時間</td>
	<td>結束時間</td>
</tr>
@foreach($projects as $project)
<tr>
	<td><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></td>
	<td>{{ $project->total_amount }}</td>
	<td>{{ $project->goal }}</td>
	<td>{{ $project->created_at }}</td>
	<td>{{ $project->deadline }}</td>
</tr>
@endforeach
</table>
@endsection