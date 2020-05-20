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
        return view('projects.index', compact('projects'));
    }
    // 專案頁面
    public function show($project_id)
    {
        $project = $this->projectService->detail($project_id);
        return view('projects.view',$project);
    }
}
