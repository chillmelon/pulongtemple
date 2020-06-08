@extends('layouts.outer')
@section('body')
<div class="row justify-content-center" style="padding-top: 120px">
  <button class="btn ec-btn" onclick="checkOut('CREDIT')">信用卡付款</button>
  <button class="btn ec-btn" onclick="checkOut('ATM')">ATM付款</button>
  <button class="btn ec-btn" onclick="checkOut('CVS')">超商代碼付款</button>
  {{-- script --}}
  <script type="text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" > $(function () {
  window.addEventListener('message', function (e) {
  alert("訂單結果資訊:" + e.data);
  <?php echo "thank you";?>
  });</script>
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
@endsection