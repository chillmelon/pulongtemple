@extends('layout')
@section('content')
	<div class="row">
		<div >
			<img src="/storage/{{ $profile->avatar }}">
			<h2>{{ $profile->name }}'s Profile</h2>
			<form enctype="multipart/form-data" action="/member/profile" method="POST">
				@csrf
				<label>Update Profile Image</label>
				<input type="file" name="avatar">
				<input type="submit">
			</form>
		</div>
	</div>
@endsection