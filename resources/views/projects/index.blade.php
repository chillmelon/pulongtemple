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