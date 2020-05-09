@extends('layout')
@section('mainContent')
	<div class="title m-b-md">
        {{ $project_info->title }}
    </div>
	<p>{{ $project_info->content }}</p>
	<p>{{ $project_info->total_amount/$project_info->goal }}</p>
	<a href="/donate/{{ $project_info->id }}">Donate Project</a>
 @endsection