@extends("layouts.outer")
@section("nav-mid")
<!-- medium navbar -->
<nav class="navbar navbar-expand navbar-dark sticky-top nav-mid">
  <div class="pages">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link " href="#">專案內容<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update.html">更新</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="comment.html">留言</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="QA.html">常見問答</a>
      </li>
    </ul>
  </div>
  <div class="donate">
    <a class="btn btn-3 wave-btn" href="/donate/{{ $id }}"><span>贊&emsp;助&emsp;$</span></a>
  </div>
</nav>
@endsection