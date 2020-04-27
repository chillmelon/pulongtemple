<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentsController extends Controller
{
    public function Check($doantion)
    {
        $SPCheckOut_Url    = 'https://payment-stage.ecpay.com.tw/SP/SPCheckOut' ;

        try {
            $obj = new \ECPay_AllInOne();

            //服務參數
            $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/SP/CreateTrade"; //服務位置
            $obj->HashKey     = '5294y06JbISpM5x9' ;                                 //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                 //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = '2000132';                                           //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                 //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            
            //基本參數(請依系統規劃自行調整)
            $obj->Send['ReturnURL']         = "https://74fa25d4.ngrok.io/callback" ;   //付款完成通知回傳的網址
            $obj->Send['PeriodReturnURL']   = "https://74fa25d4.ngrok.io/callback" ;  //付款完成通知回傳的網址
            $obj->Send['ClientBackURL']     = "https://74fa25d4.ngrok.io/success" ;   //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']   = $doantion['id'];                        //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                     //交易時間
            $obj->Send['TotalAmount']       = $doantion['amount'];                       //交易金額
            $obj->Send['TradeDesc']         = "very good" ;                            //交易描述
            $obj->Send['ChoosePayment']     = \ECPay_PaymentMethod::ALL ;              //付款方式:全功能
            //訂單的商品資料
            array_push($obj->Send['Items'], array('Name' => request('name'), 'Price' => request('amount'), 'Currency' => "元", 'Quantity' => (int) "1",));
            
            $SDK_Return = $obj->CreateTrade();
            $SDK_Return['SPCheckOut']  = $SPCheckOut_Url ;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
}
