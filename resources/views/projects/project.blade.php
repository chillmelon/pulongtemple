@extends("auth.login-button")

@section("body")
@yield("summary")

<!-- medium navbar -->
<nav class="navbar navbar-expand navbar-dark sticky-top nav-mid">
  <div class="pages">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link @yield('content-active')" href="/projects/{{$id}}">專案內容</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('updates-active')" href="/projects/{{$id}}/updates">更新</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('comments-active')" href="/projects/{{$id}}/comments">留言</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('faq-active')" href="/projects/{{$id}}/faq">常見問答</a>
      </li>
    </ul>
  </div>
  <div class="donate">
    <a class="btn btn-3 wave-btn" href="/donate/{{ $id }}"><span>贊&emsp;助&emsp;$</span></a>
  </div>
</nav>

@yield("sub-content")
@endsection
