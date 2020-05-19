<?php

namespace App\Services;
use App\Repositories\DonateRepository;
use App\Repositories\ProjectRepository;
class MemberService
{
    private $user_id;
    public function __construct(
    DonateRepository $donateRepository,
    ProjectRepository $drojectRepository
    )
    {
        $this->donateRepository = $donateRepository;
        $this->projectRepository = $drojectRepository;
        $this->user_id = auth()->user()['id'];
    }

    public function all(){
        dd($this);
    }
}
