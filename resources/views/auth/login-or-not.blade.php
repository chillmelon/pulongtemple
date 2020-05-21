@extends("layouts.outer")

@section("login&out")
{{-- has login --}}
@auth
  <li class="">
    <a class="btn" href="{{ url('/dashboard') }}">{{ auth()->user()->name }}</a>
  </li>
  <li class="">
    <a class="btn" href="{{ route('logout') }}"
       onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      登出
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </li>
{{-- has log out --}}
@else
  <li class="">
    <a class="btn" href="{{ route('login') }}">登入</a>
  </li>
  <li class="">
    <a class="btn" href="{{ route('register') }}">註冊</a>
  </li>
@endauth
@endsection