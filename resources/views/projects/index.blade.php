@extends('auth.login-button')
@section('body')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-11 col-xl-9">
      <div class="pltp-box">
        <pre class="pltp overf-v ab-center">
██████╗  ██╗   ██╗ ██╗       ██████╗  ███╗   ██╗  ██████╗
██╔══██╗ ██║   ██║ ██║      ██╔═══██╗ ████╗  ██║ ██╔════╝
██████╔╝ ██║   ██║ ██║      ██║   ██║ ██╔██╗ ██║ ██║  ███╗
██╔═══╝  ██║   ██║ ██║      ██║   ██║ ██║╚██╗██║ ██║   ██║
██║      ╚██████╔╝ ███████╗ ╚██████╔╝ ██║ ╚████║ ╚██████╔╝
╚═╝       ╚═════╝  ╚══════╝  ╚═════╝  ╚═╝  ╚═══╝  ╚═════╝

████████╗ ███████╗ ███╗   ███╗ ██████╗  ██╗      ███████╗
╚══██╔══╝ ██╔════╝ ████╗ ████║ ██╔══██╗ ██║      ██╔════╝
   ██║    █████╗   ██╔████╔██║ ██████╔╝ ██║      █████╗
   ██║    ██╔══╝   ██║╚██╔╝██║ ██╔═══╝  ██║      ██╔══╝
   ██║    ███████╗ ██║ ╚═╝ ██║ ██║      ███████╗ ███████╗
   ╚═╝    ╚══════╝ ╚═╝     ╚═╝ ╚═╝      ╚══════╝ ╚══════╝
        </pre>
      </div>
      {{-- product --}}
      <div class="row justify-content-center">
        @foreach($projects as $project)
        <div class="product-box col-12 col-md-6">
          <div class="product custom-bdr" onclick="location.href='projects/{{ $project->id }}';">
            <div class="product-head">
              {{ $project->title }}
            </div>
            <div class="product-body">
              <p>{{ $project->content }}</p>
              <div class="product-progress"></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      {{--  --}}
      <br>
      <br>
      <br>
      <div class="rank">
        <table>
          @foreach($projects as $project)
          <tr>
        <td><a class="btn btn-5" href="projects/{{ $project->id }}">{{ $project->title }}</a></td>
        <td><img src="/storage/{{ $project->cover }}"></td>
        <td><a>{{ $project->progress }}</a></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
