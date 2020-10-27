@extends("projects.min-summary")

@section("faq-active")
active
@endsection

@section("sub-content")

<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
      @if ($project->faqs->count()==0)
        <div class="pt-5 text-center thd-color">
          <h5>本專案尚無問答，有任何疑惑請聯絡提案人！</h5>
        </div>
      @else
        @foreach($project->faqs as $faq)
          <div class="custom-bdr qa">
          <h4>Q{{$loop->index + 1}}. {{$faq->question}}</h4>
          <h6>更新於 {{$faq->updated_at}}</h6>
          <span class="answer">{{$faq->answer}}</span>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</div>

@endsection
