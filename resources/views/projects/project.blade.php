@extends("layouts.outer")
@yield("summary")
@section("nav-mid")
<!-- medium navbar -->
<nav class="navbar navbar-expand navbar-dark sticky-top nav-mid">
  <div class="pages">
    <ul class="navbar-nav">
      <li class="nav-item @yield('content-active')">
        <a class="nav-link " href="#">專案內容@yield("content-current")</a>
      </li>
      <li class="nav-item @yield('update-active')">
        <a class="nav-link" href="update.html">更新@yield("update-current")</a>
      </li>
      <li class="nav-item @yield('comment-active')">
        <a class="nav-link" href="comment.html">留言@yield("comment-current")</a>
      </li>
      <li class="nav-item @yield('QA-active')">
        <a class="nav-link @yield('QA-active')" href="QA.html">常見問答@yield("QA-current")</a>
      </li>
    </ul>
  </div>
  <div class="donate">
    <a class="btn btn-3 wave-btn" href="#"><span>贊&emsp;助&emsp;$</span></a>
  </div>
</nav>
@endsection
@yield("sub-content")