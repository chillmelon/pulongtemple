<?php

namespace App\Services;
use App\Repositories\ProjectRepository;
class ProjectService
{
    public function __construct(ProjectRepository $projectRepository){
        $this->projectRepository = $projectRepository;
    }
    // 首頁畫面
    public function all()
    {
        $projects = $this->projectRepository->all();
        return $projects;
    }
    // 專案頁面
    public function simple()
    {
        $projects = $this->projectRepository
            ->all()
            ->map(function($projects=null){
                return $this->format($projects);
            });
        return $projects;
    }

    public function detail($project_id=null)
    {
        $project = $this->projectRepository
            ->findById($project_id);
        return $this->format($project);
    }

    public function format($project=null){
        return [
            'id'=>$project->id,
            'title'=>$project->title,
            'cover'=>$project->image,
            'content'=>$project->content,
            'total_amount'=>$project->total_amount,
            'progress'=>round($project->total_amount/$project->goal*100),
            'time_left'=>date('d',strtotime( $project->deadline ) - time()),
            'supporters'=>$project->donates->unique('user_id')->count('user_id'),
            'starter'=>$project->user->name
        ];
    }
}
