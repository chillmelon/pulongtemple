<?php

namespace App\Services;
use App\Repositories\ProjectRepository;
class ProjectService
{
    public function __construct(ProjectRepository $projectRepository){
        $this->projectRepository = $projectRepository;
    }

    public function all()
    {
        $projects = $this->projectRepository->all();
        return $projects;
    }
    // simple introduction for each project
    public function simple()
    {
        $projects = $this->projectRepository
            ->all()
            ->map(function($projects=null){
                return $this->format($projects);
            });
        return $projects;
    }
    // details on a spcific project
    public function detail($project_id=null)
    {
        $project = $this->projectRepository
            ->findById($project_id);
        return $this->format($project);
    }
	public function donated($project=null){
		$donated = false;
		if (auth()->user()){
			$user_id = auth()->user()->id;
			$donated = $project->user->where('paid',1)->where('id',$user_id)->exists();
		}
		return $donated;
	}
    //count fundraising progress
    public function format($project=null){
		$project->days_left=date('d',strtotime( $project->deadline ) - time());
		$project->supporters=$project->donates->where('paid',1)->unique('user_id')->count('user_id');
		$project->amount=$project->donates->where('paid',1)->sum('amount');
		$project->progress=round($project->amount/$project->goal*100);
		$project->starter=$project->user->name;
		$project->donated=$this->donated($project);
		return $project;
	}
}
