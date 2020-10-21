@extends('layouts.outer')
@section('body')
<div class="contrainer" style="overflow-x: hidden;">
  <div class="row justify-content-center" style="padding: 8rem 0">
    <div style="max-width: 500px;">
      <div class="custom-bdr-3d">
        <button class="btn ec-btn m-0" onclick="checkOut('CREDIT')">信用卡付款</button>
      </div>
      <div class="custom-bdr-3d">
        <button class="btn ec-btn m-0" onclick="checkOut('ATM')">ATM付款</button>
      </div>
      <div class="custom-bdr-3d">
        <button class="btn ec-btn m-0" onclick="checkOut('CVS')">超商代碼付款</button>
      </div>
    </div>
    {{-- script --}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      // 監聽API回傳訊息
      $(function () {
        window.addEventListener('message', function (e) {
          console.log('API回傳前端訂單資訊：'+e.data);
          var obj = JSON.parse(e.data);
          if(obj.RtnCode == '1'){
            // redirect to thankyoupage
            window.location = "/thankyou";
          }
        });
      });
    </script>
    <script src="https://payment.ecpay.com.tw/Scripts/SP/ECPayPayment_1.0.0.js"
    data-MerchantID= "<?php echo$MerchantID?>"
    data-SPToken= "<?php echo$SPToken?>"
    data-PaymentType="CREDIT"
    data-PaymentName="信用卡"
    data-CustomerBtn="1" >
    </script>
    <script src="https://payment.ecpay.com.tw/Scripts/SP/ECPayPayment_1.0.0.js"
    data-MerchantID= "<?php echo$MerchantID?>"
    data-SPToken= "<?php echo$SPToken?>"
    data-PaymentType="ATM"
    data-PaymentName="ATM"
    data-CustomerBtn="1" >
    </script>
    <script src="https://payment.ecpay.com.tw/Scripts/SP/ECPayPayment_1.0.0.js"
    data-MerchantID= "<?php echo$MerchantID?>"
    data-SPToken= "<?php echo$SPToken?>"
    data-PaymentType="CVS"
    data-PaymentName="超商代碼"
    data-CustomerBtn="1" >
    </script>
  </div>
</div>
@endsection
