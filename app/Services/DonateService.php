<?php

namespace App\Services;
use App\Repositories\DonateRepository;
class DonateService
{
    private $donateRepository;
    public function __construct(DonateRepository $donateRepository){
        $this->donateRepository = $donateRepository;
    }
    // 首頁畫面
    public function all()
    {
        $donates = $this->donateRepository->all();
        return $donates;
    }
    // 專案頁面

    public function userDonates($user_id)
    {
        $donate = $this->donateRepository->findById($user_id);
        return view('member.myDonation',$donate);
    }
}
