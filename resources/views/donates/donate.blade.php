@extends('layout')
@section('mainContent')
	<h2>Donate Projects</h2>
	<form method="POST" action="{{ route('donates.store', $project_info->id) }}" name="donation">
		@csrf
		name
		<input type="hidden" name="project_id" value = "{{ $project_info->id }}">
		<input type="hidden" name="user_id" value = "{{ $user_info->id }}">
		<input type="text" name="name" value = "{{ $user_info->name }}" >
		amount
		<input type="integer" name="amount">
		email
		<input type="text" name="email" value="{{ $user_info->email }}">
		comment
		<input type="text" name="comment">
		<input type="submit" value="send">
	</form>
@endsection