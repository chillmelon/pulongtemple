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
    }
    public function donates($user_id=null){
        $donates = $this->donateRepository->findByUser($user_id);
        return $donates;
    }
    public function projects($user_id=null){
        $projects = $this->projectRepository->findByUser($user_id);
        return $projects;
    }
}
