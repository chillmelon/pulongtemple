@extends('layout')
@section('mainContent')
	<h1>List Projects</h1>
	<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
	@foreach($projects as $project)
	<div>
		<h3><a href="projects/{{ $project->id }}">{{$project->title}}</a></h3>
		<a>{{$project->content}}</a>
	</div>
	@endforeach
@endsection