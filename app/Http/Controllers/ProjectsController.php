<?php
namespace App\Http\Controllers;
use App\Services\ProjectService;
use App\Services\DonateService;
class ProjectsController
{
    // 首頁畫面
    public function __construct(
        ProjectService $projectService,
        DonateService $donateService
    ){
        $this->projectService = $projectService;
        $this->donateService = $donateService;
    }
    public function index()
    {
        $projects = $this->projectService->simple();
        return view('projects.index', ['projects'=>$projects]);
    }
    // 專案頁面
	public function show($project_id)
	{
		$project = $this->projectService->detail($project_id);
		$donated = 0;
		if (auth()->user()){
			$user_id = auth()->user()->id;
			$donated = $this->projectService->donated($project_id, $user_id);
		}
		$data = [
			'project'=>$project,
			'donated'=>$donated
		];
		return view('projects.content', $data);
	}
    public function showUpdates($project_id)
    {
        $project = $this->projectService->detail($project_id);
        return view('projects.updates',['project'=>$project]);
    }
    public function showComments($project_id)
    {
		$project = $this->projectService->detail($project_id);
		$topFive = $this->donateService->topFive($project_id);
		$randFive = $this->donateService->randFive($project_id);
		$gallary = $this->donateService->gallary($project_id);
		$data = [
			'project' => $project,
			'topFive' => $topFive,
			'randFive' => $randFive,
			'gallary' => $gallary
		];
        return view('projects.comments',$data);
    }
    public function faq($project_id)
    {
        $project = $this->projectService->detail($project_id);
        return view('projects.faq',['project'=>$project]);
    }
	public function create()
	{
		return view('projects.create');
	}
}
