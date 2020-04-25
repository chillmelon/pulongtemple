<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentsController extends Controller
{
    public function test()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $uuid = str_replace("-", "",substr(Str::uuid()->toString(), 0,18));
        try {
            $obj = new \ECPay_AllInOne();

            //服務參數
            $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";   //服務位置
            $obj->HashKey     = '5294y06JbISpM5x9' ;                                           //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                           //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = '2000132';                                                     //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            //基本參數(請依系統規劃自行調整)
            $MerchantTradeNo = $uuid ;
            $obj->Send['ReturnURL']         = "https://74fa25d4.ngrok.io/callback" ;    //付款完成通知回傳的網址
            $obj->Send['PeriodReturnURL']         = " https://74fa25d4.ngrok.io/callback" ;    //付款完成通知回傳的網址
            $obj->Send['ClientBackURL'] = " https://74fa25d4.ngrok.io/success" ;    //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                          //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
            $obj->Send['TotalAmount']       = request('amount');                                      //交易金額
            $obj->Send['TradeDesc']         = "good to drink" ;                          //交易描述
            $obj->Send['ChoosePayment']     = \ECPay_PaymentMethod::Credit ;              //付款方式:Credit
            $obj->Send['IgnorePayment']     = \ECPay_PaymentMethod::GooglePay ;           //不使用付款方式:GooglePay
            //訂單的商品資料
            array_push($obj->Send['Items'], array('Name' => request('name'), 'Price' => request('amount'),
            'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));
            session()->forget('cart');
            $obj->CheckOut();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ecpay');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payments $payments)
    {
        //
    }
}
