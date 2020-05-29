@extends('layout')
@section('content')
<h1>Create Project</h1>
<form method="POST" action="/project">
	@csrf

	<input type="text" name="title">
	<input type="number" name="goal">
	<input type="date" name="deadline">
	<textarea id="editor" name="content">
		<p>edit your content here.</p>
	</textarea>
	<input type="submit">
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.catch( error => {
		console.error( error );
	});
</script>
@endsection
