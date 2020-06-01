<?php
namespace App\Http\Controllers;
use App\Services\ProjectService;
class ProjectsController
{
    // 首頁畫面
    public function __construct(
        ProjectService $projectService
    ){
        $this->projectService = $projectService;
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
        return view('projects.content',['project'=>$project]);
    }
    public function showUpdates($project_id)
    {
        $project = $this->projectService->detail($project_id);
        return view('projects.updates',['project'=>$project]);
    }
    public function showComments($project_id)
    {
        $project = $this->projectService->detail($project_id);
        return view('projects.comments',['project'=>$project]);
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
