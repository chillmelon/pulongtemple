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
		$comments = $project->donates->whereNotNull('comment')->sortByDesc('created_at');
		$topFive = $this->donateService->topFive($project_id);
		$data = [
			'project' => $project,
			'comments' => $comments,
			'topFive' => $topFive,
		];
		return view('projects.content',$data);
	}
}
