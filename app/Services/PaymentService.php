<?php

namespace App\Services;
use App\Repositories\DonateRepository;
use App\Repositories\ProjectRepository;
class PaymentService
{
    public function __construct
    (
        DonateRepository $donateRepository,
        ProjectRepository $projectRepository
    ){
        $this->donateRepository = $donateRepository;
        $this->projectRepository = $projectRepository;
    }
    public function ECPay($donation=null){
        $SPCheckOut_Url    = 'https://payment-stage.ecpay.com.tw/SP/SPCheckOut' ;

        try {
            $obj = new \ECPay_AllInOne();
            //服務參數
            $obj->ServiceURL  = "https://payment.ecpay.com.tw/SP/CreateTrade"; //服務位置
						$obj->HashKey     = 'HfgvsvxBsMq87mRU' ;                           //正式資料
						$obj->HashIV      = 'iu3Vtxa1T9ADwNGl' ;                           //正式資料
						$obj->MerchantID  = '3157248';                                     //正式資料
						//$obj->HashKey     = '5294y06JbISpM5x9' ;                                    //測試用Hashkey，請自行帶入ECPay提供的HashKey
						//$obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                    //測試用HashIV，請自行帶入ECPay提供的HashIV
						//$obj->MerchantID  = '2000132';                                              //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            //基本參數(請依系統規劃自行調整)
            $obj->Send['ReturnURL']= "https://www.pulongtemple.wtf/callback" ; //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']= $donation['uuid'];                  //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');             //交易時間
            $obj->Send['TotalAmount'] = $donation['amount'];                   //交易金額
            $obj->Send['TradeDesc'] = "very good" ;                            //交易描述
            $obj->Send['ChoosePayment'] = 'ALL' ;                              //付款方式:全功能
            //訂單的商品資料
            array_push($obj->Send['Items'], array(
                'Name' => request('name'),
                'Price' => request('amount'),
                'Currency' => "元",
                'Quantity' => (int) "1"
            ));
            //送訂單給ECPay
            $SDK_Return = $obj->CreateTrade();
            //拿到返回參數
            return $SDK_Return;
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function callback($request=null)
    {
        $uuid = $request->MerchantTradeNo;
        $rcode = $request->RtnCode;
        $this->saveRequest($request);
        if ($rcode=='1'){
            $this->donateRepository->update($uuid,['paid'=>'1']);
						$donation = $this->donateRepository
															->findByUuid($uuid);
						var_dump($this->refreshTotalAmount($donation));
        }
    }
    public function saveRequest($request=null)
    {
        $r = new \App\Request();
        $r->url=$request->fullUrl();
        $r->ip=$request->ip();
        $r->request=json_encode($request->all());
        $r->save();
    }

    public function refreshTotalAmount($donation)
    {
        $project_id = $donation->project_id;
        $option_id = $donation->option_id;
        $total_amount = $this->donateRepository
                            ->findByProject($project_id)
                            ->where('paid',1)
                            ->sum('amount');
				$option_sold = $this->donateRepository
														->findByOption($option_id)
                            ->where('paid',1)
														->count();
        $this->projectRepository->update($project_id,['total_amount'=>$total_amount]);
        $this->projectRepository->updateOption($option_id,['sold'=>$option_sold]);
				return "ok";
    }
}
