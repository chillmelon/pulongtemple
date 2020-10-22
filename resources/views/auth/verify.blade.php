@extends("auth.no-login-button")
@section("body")
<div class="container">
  <div class="row justify-content-center mt-3">
    <div class="col-md-8 pb-3">
      <div class="custom-bdr-3d">
        <div class="verify-box">
          <pre class="verify overf-v ab-center">
                   .__  _____       
___  __ ___________|__|/ ____\__.__.
\  \/ // __ \_  __ \  \   __<   |  |
 \   /\  ___/|  | \/  ||  |  \___  |
  \_/  \___  >__|  |__||__|  / ____|
           \/                \/     
                         .__.__     
     ____   _____ _____  |__|  |    
   _/ __ \ /     \\__  \ |  |  |    
   \  ___/|  Y Y  \/ __ \|  |  |__  
    \___  >__|_|  (____  /__|____/  
        \/      \/     \/           
          </pre>
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