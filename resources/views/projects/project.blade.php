@extends("auth.login-button")

@section( "body")
	{{--判斷是否曾贊助過--}}
	@if($project->donated)
		<div class="donated pd-12 ff-2P">
      <h3>Thanks for your donation.</h3>
    </div>
	@endif
	{{--done--}}
@yield("summary")


<!-- medium navbar -->
<nav class="navbar navbar-expand navbar-dark sticky-top nav-mid">
  <div class="pages">
    <ul class="navbar-nav">
      <li class="nav-item">
		  <a class="nav-link @yield('content-active')" href="/projects/{{ $project->id }}">專案內容</a>
      </li>
      <li class="nav-item">
		  <a class="nav-link @yield('updates-active')" href="/projects/{{ $project->id }}/updates">更新</a>
      </li>
      <li class="nav-item">
		  <a class="nav-link @yield('comments-active')" href="/projects/{{ $project->id }}/comments">留言</a>
      </li>
      <li class="nav-item">
		  <a class="nav-link @yield('faq-active')" href="/projects/{{ $project->id }}/faq">常見問答</a>
      </li>
    </ul>
  </div>
  {{-- donate button --}}
  @if ($project->days_left < 0)
  <div class="donate">
    <a class="btn" href="#"><span>專案結束</span></a>
  </div>
  @else
  <div class="donate">
	  <a class="btn wave-btn" href="/donate/{{ $project->id }}"><span>贊 助 $</span></a>
  </div>
  @endif
</nav>

@yield("sub-content")

@endsection
