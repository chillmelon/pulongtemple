<?php

namespace App\Http\Controllers;

use App\Donates;
use App\Projects;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\PaymentsController;

class DonatesController extends Controller
{
    public function create($id)
    {
        $data['project_info'] = Projects::where('id',$id)->first();
        if (is_null(auth()->user())) {
            return view('auth.login');
        }
        $data['user_info'] = auth()->user();
        return view('donates.donate', $data);
    }

    public function new(Request $request)
    {
        $request->validate([
            '_token',
            'name' => 'required',
            'amount' => 'required',
            'email' => 'required',
            'comment',
        ]);
        $donation=$request->all();
        $uuid = str_replace("-", "",substr(Str::uuid()->toString(), 0,18));
        $donation += ['uuid' => $uuid];
        Donates::create($donation);
        $result=$this->Check($donation);
        $orderInfo['SPToken'] = $result['SPToken'];
        $orderInfo['MerchantID'] = $result['MerchantID'];
        return view('donates.ecpay',$orderInfo);
    }

    public function Check($donation)
    {
        $SPCheckOut_Url    = 'https://payment-stage.ecpay.com.tw/SP/SPCheckOut' ;

        try {
            $obj = new \ECPay_AllInOne();

            //服務參數
            $obj->ServiceURL  = "https://payment.ecpay.com.tw/SP/CreateTrade"; //服務位置
            $obj->HashKey     = 'HfgvsvxBsMq87mRU' ;                                 //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = 'iu3Vtxa1T9ADwNGl' ;                                 //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = '3157248';                                           //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                 //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            
            //基本參數(請依系統規劃自行調整)
            $obj->Send['ReturnURL']         = "https://www.pulongtemple.wtf/callback" ;   //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']   = $donation['uuid'];                        //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                     //交易時間
            $obj->Send['TotalAmount']       = $donation['amount'];                       //交易金額
            $obj->Send['TradeDesc']         = "very good" ;                            //交易描述
            $obj->Send['ChoosePayment']     = \ECPay_PaymentMethod::ALL ;              //付款方式:全功能
            //訂單的商品資料
            array_push($obj->Send['Items'], array('Name' => request('name'), 'Price' => request('amount'), 'Currency' => "元", 'Quantity' => (int) "1",));
            //送訂單給ECPay
            $SDK_Return = $obj->CreateTrade();
            //拿到返回參數
            $SDK_Return['SPCheckOut']  = $SPCheckOut_Url ;
            $SDK_Return['PaymentType'] = 'CREDIT' ;
            
            return $SDK_Return;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        $uuid = $request->MerchantTradeNo;
        $rcode = $request->RtnCode;
        $url=$request->fullUrl();
        $ip=$request->ip();
        $r=new \App\Request();
        $r->ip=$ip;
        $r->url=$url;
        $r->request=json_encode($request->all());
        $r->save();
        if ($rcode=='1'){
            $order=Donates::where('uuid',$uuid);
            $order->update(['paid'=>'1']);
            $projectID = $order->pluck('project_id');
            $total_amount = Donates::where('project_id', $projectID)->where('paid','1')->sum('amount');
            Projects::where('id',$projectID)->update(['total_amount'=>$total_amount]);
            return "OK 1";
        }
    }
}
