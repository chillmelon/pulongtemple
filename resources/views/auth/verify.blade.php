@extends("auth.no-login-button")

@section("body")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 c-box">
            <div class="card custom-card">
                <div class="card-header">認證 E-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            新的認證信已寄到您的信箱。
                        </div>
                    @endif

                    認證信已經寄到您的信箱，如果沒收到的話，
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-5">按此寄出新的認證信</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
