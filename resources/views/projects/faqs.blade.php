@extends("projects.min-summary")

@section("faq-active")
active
@endsection

@section("sub-content")

<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
		@foreach($project->faqs as $faq)
      <div class="custom-bdr qa">
		  <h4>Q{{$loop->index + 1}}. {{$faq->question}}</h4>
		  <h6>更新於 {{$faq->updated_at}}</h6>
		  <span class="answer">{{$faq->answer}}</span>
      </div>
  @endforeach
    </div>
  </div>
</div>

@endsection
