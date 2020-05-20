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
    ){
        $this->donateRepository = $donateRepository;
        $this->projectRepository = $drojectRepository;
    }
    public function donates($user_id=null){
        $donates = $this->donateRepository->findByUser($user_id)->sortByDesc('created_at');
        return $donates;
    }
    public function projects($user_id=null){
        $projects = $this->projectRepository->findByUser($user_id);
        return $projects;
    }
    public function profile($user_id=null){
        $user = auth()->user();
        return $user;
    }
}
