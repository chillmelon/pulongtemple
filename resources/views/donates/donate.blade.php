@extends('layout')
@section('content')
<h2>Donate Projects</h2>
<form method="POST" action="{{ route('donates.new', $project_info['id']) }}" name="donation">
	@csrf
	name
	<input type="hidden" name="project_id" value = "{{ $project_info['id'] }}">
	<input type="hidden" name="user_id" value = "{{ $user_info['id'] }}">
	<input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value = "{{ $user_info['name'] }}" >
	@error('name')
	<span class="invalid-feedback" role="alert">
		<strong>{{ $message }}</strong>
	</span>
	@enderror
	amount
	<input class="form-control @error('amount') is-invalid @enderror" type="integer" name="amount">
	@error('amount')
	<span class="invalid-feedback" role="alert">
		<strong>{{ $message }}</strong>
	</span>
	@enderror
	email
	<input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ $user_info['email'] }}">
	@error('email')
	<span class="invalid-feedback" role="alert">
		<strong>{{ $message }}</strong>
	</span>
	@enderror
	comment
	<input type="text" name="comment">
	<input type="submit" value="send">
</form>
@endsection