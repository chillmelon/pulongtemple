<?php

namespace App\Services;
use App\Repositories\DonateRepository;
use Illuminate\Support\Str;

class DonateService
{
    private $donateRepository;
    public function __construct(DonateRepository $donateRepository){
        $this->donateRepository = $donateRepository;
    }
    // everything
    public function all()
    {
        $donates = $this->donateRepository->all();
        return $donates;
    }
    // find donations made by a specific user
    public function userDonates($user_id=null)
    {
        $donates = $this->donateRepository->findByUserId($user_id);
        return $donates;
    }
    // find donations for a specific project
    public function projectDonates($project_id=null)
    {
        $donates = $this->donateRepository->finByProjectId($project_id);
        return $donates;
    }
    public function new($donation=null)
    {
        $donation->validate([
            '_token',
            'name' => 'required|string|max:16',
            'amount' => 'required|integer|max:1000000',
            'email' => 'required|email|max:30',
            'comment' => 'sometimes|string|max:255'
        ]);
        $donation=$this->format($donation);
        $this->donateRepository->create($donation);
        return $donation;
    }
    public function format($donation){
        $uuid = str_replace("-","",substr(Str::uuid()->toString(),0,18));
        return [
            'name' => $donation->name,
            'amount' => $donation->amount,
            'email'=>$donation->email,
            'comment'=>$donation->comment,
            'project_id'=>$donation->project_id,
            'user_id'=>$donation->user_id,
            'uuid'=>$uuid
        ];
    }
}
