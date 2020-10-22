@extends("auth.no-login-button")
@section("body")
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-8 pb-3 custom-bdr-3d">
      <div class="">
        <div class="">
          <div class="verify-box">
            <pre class="verify overf-v ab-center">
 ___      ___  _______   _______    __     _______  ___  ___
|"  \    /"  |/"     "| /"      \  |" \   /"     "||"  \/"  |
 \   \  //  /(: ______)|:        | ||  | (: ______) \   \  /
  \\  \/. ./  \/    |  |_____/   ) |:  |  \/    |    \\  \/
   \.    //   // ___)_  //      /  |.  |  // ___)    /   /
    \\   /   (:      "||:  __   \  /\  |\(:  (      /   /
     \__/     \_______)|__|  \___)(__\_|_)\__/     |___/

      _______  ___      ___       __        __    ___
     /"     "||"  \    /"  |     /""\      |" \  |"  |
    (: ______) \   \  //   |    /    \     ||  | ||  |
     \/    |   /\\  \/.    |   /' /\  \    |:  | |:  |
     // ___)_ |: \.        |  //  __'  \   |.  |  \  |___
    (:      "||.  \    /:  | /   /  \\  \  /\  |\( \_|:  \
     \_______)|___|\__/|___|(___/    \___)(__\_|_)\_______)
            </pre>
          </div>
        </div>
        <div class="px-4">
          @if (session('resent'))
          <div class="new-email">
            新的認證信已寄出。
          </div>
          @endif
          <h4>認證信已寄出，請到信箱中點擊認證連結。</h4>
          <br>
          如果沒收到的話 👇
          <br>
          <br>
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn mb-3">要求新的一封認證信</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection