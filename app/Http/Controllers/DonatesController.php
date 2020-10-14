<?php

namespace App\Http\Controllers;

use App\Services\DonateService;
use App\Services\PaymentService;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonatesController extends Controller
{
    public function __construct(
        DonateService $donateService,
        PaymentService $paymentService,
        ProjectService $projectService
    ){
        $this->donateService = $donateService;
        $this->paymentService = $paymentService;
        $this->projectService = $projectService;
    }

    public function create($project_id=null)
    {
        $data['project_info'] = $this->projectService->detail($project_id);
        $data['user_info'] = auth()->user();
        return view('donates.donate', $data);
    }

    public function order($option_id=null)
    {
				$option = $this->projectService->optionInfo($option_id);
				$data['option_info'] = $option;
				$data['project_info'] = $option->project;
        $data['user_info'] = auth()->user();
        return view('donates.order', $data);
    }

    public function new(Request $request)
    {
        $donation=$this->donateService->new($request);
        dd($request);
        $ECPay=$this->paymentService->ECPay($donation);
        $orderInfo['SPToken'] = $ECPay['SPToken'];
        $orderInfo['MerchantID'] = $ECPay['MerchantID'];
        return view('donates.ecpay',$orderInfo);
    }

    public function callback(Request $request)
    {
        $this->paymentService->callback($request);
    }
}
