@extends('layout')
@section('mainContent')
<table>
	<tr>
		<td>{{ $profile->name }}</td>
		<td><img src="/storage/{{ $profile->avatar }}"></td>
		<td><a href="/member/edit/{{ $profile->id }}"></a></td>
	</tr>
	<tr>
		<td></td>
		<td>{{ $profile->email }}</td>
	</tr>
</table>

@endsection