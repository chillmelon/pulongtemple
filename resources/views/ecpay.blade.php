@extends('layout')
@section('mainContent')
<form method="POST" action="/pay" name="donation">
	@csrf
	amount
	<input type="number" name="amount" placeholder="100">
	name
	<input type="text" name="name" placeholder="name">
	email
	<input type="text" name="email" placeholder="email">
	<input type="submit" value="send">
</form>
@endsection