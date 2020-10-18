@extends("layouts.outer")

@section("login-button")
{{-- has login --}}
@auth
  <li>
    <a class="btn px-2 py-0">{{ auth()->user()->name }} <span>▼</span></a>
    <ul class="dropdown custom-bdr">
      <li><a class="btn wite-btn" href="{{ url('/dashboard') }}">個人資料</a></li>
      <li><a class="btn wite-btn" href="/member/donations">我的贊助</a></li>
      <li><a class="btn wite-btn" href="/member/projects">我的專案</a></li>
      <li>
        <a class="btn" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          登出
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
  </li>
{{-- has log out --}}
@else
  <li class="">
    <a class="btn px-2 py-0" href="{{ route('login') }}">登入</a>
  </li>
@endauth
@endsection