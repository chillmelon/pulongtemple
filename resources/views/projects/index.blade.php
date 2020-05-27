@extends('auth.login-button')
@section('body')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
      <div class="pltp-box">
        <pre class="pltp">
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
      <div class="rank">
        <table>
          @foreach($projects as $project)
          <tr>
            <td><a class="btn btn-5" href="projects/{{$project['id']}}">{{$project['title']}}</a></td>
            <td><img src="/storage/{{ $project['cover'] }}"></td>
            <td><a>{{ $project['progress'] }}</a></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection