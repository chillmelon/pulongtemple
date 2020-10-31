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
	// get 方案 info
	public function optionInfo($option_id=null)
	{
	 $option = $this->projectRepository
		 							->getOptionById($option_id);
	 return $option;
	}

	// 判斷已登入使用者是否贊助過專案
  public function donated($project=null){
    $donated = false;
    if (auth()->user()){
      $user_id = auth()->user()->id;
      $donated = $project->donates->where('paid',1)->contains('user_id',$user_id);
    }
    return $donated;
  }

  public function userProjects($user_id){
    $projects = $this->projectRepository->findByUser($user_id)
                                        ->map(function($project){
                                          return $this->format($project);
                                        });
    return $projects;
  }
  //count fundraising progress
  public function format($project=null){
    $project->days_left = -1;
    $interval = date_diff(date_create(),date_create($project->deadline));
    if($interval->invert == 0){
      $project->days_left = $interval->d;
    }
    $project->supporters=$project->donates->where('paid',1)->unique('user_id')->count('user_id');
    $project->donors=$project->donates->where('paid',1)->where('option_id',NULL)->unique('user_id')->count('user_id');
    $project->amount=$project->total_amount;
    $project->progress=round($project->amount/$project->goal*100);
    $project->starter=$project->user->name;
    $project->donated=$this->donated($project);
    return $project;
  }
}
