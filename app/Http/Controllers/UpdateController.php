<?php
namespace App\Http\Controllers;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct(
        ProjectService $projectService
    ){
        $this->projectService = $projectService;
    }
    public function show($project_id)
    {
    	$projects = $this->projectService->detail($project_id);
    	return view('updates.view', $projects);
    }
	public function create($project_id)
	{
    	$projects = $this->projectService->detail($project_id);
		return view('updates.create', ['project' => $project]);
	}
}
