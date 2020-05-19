@extends('layout')
@section('mainContent')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
				<div class="window" style="width: auto">
				  <div class="title-bar">
				    <div class="title-bar-text">Dashboard</div>
				    <div class="title-bar-controls">
				      <button aria-label="Minimize"></button>
				      <button aria-label="Maximize"></button>
				      <button aria-label="Close"></button>
				    </div>
				  </div>
				  <div class="window-body" style="text-align:center;">
				  	<table style="width: 100%;">
				  		<tr>
				  			<td><button class="bigButton"><a href="/mydonations">my donations</a></button></td>
				  		</tr>
				  		<tr>
				  			<td><button class="bigButton"><a href="/myprojects">my projects</a></button></td>
				  		</tr>
				  		<tr>
				  			<td><button class="bigButton"><a href="/myprofile">my profile</a></button></td>
				  		</tr>
				  	</table>						
				  </div>
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif
					
				</div>
	</div>
</div>
@endsection
