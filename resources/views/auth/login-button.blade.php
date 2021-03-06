@extends("layouts.outer")

@section("login-button")
{{-- has log in --}}
@auth
  <li>
    <a class="btn px-2 py-1 " style="font-size: 14px">{{ auth()->user()->name }} <span>▼</span></a>
    {{-- dropdown menu --}}
    <ul class="dropdown custom-bdr p-2">
      <li><a class="btn white-btn p-1" href="{{ url('/dashboard') }}">個人資料</a></li>
      <li><a class="btn white-btn p-1" href="/member/donations">我的贊助</a></li>
      <li><a class="btn white-btn p-1" href="/member/projects">我的專案</a></li>
      <li>
        <a class="btn p-1" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          LOG OUT
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
    <a class="btn px-2 py-1" href="{{ route('login') }}">
      SIGN IN ➤
    </a>
  </li>
@endauth
@endsection