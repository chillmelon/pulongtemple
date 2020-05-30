<?php
namespace App\Http\Controllers;
use App\Services\ProjectService;
use App\Services\UpdateService;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct(
        ProjectService $projectService,
		UpdateService $updateService
    ){
        $this->projectService = $projectService;
        $this->updateService = $updateService;
    }
    public function browse($project_id)
    {
    	$projects = $this->projectService->detail($project_id);
    	return view('updates.view', $projects);
    }
	public function show($id){
		$update = $this->updateService->show($id);
		$project = $update->project;
		$data=[
			'update' => $update,
			'project' => $project
		];
		return view('updates.view', $data);
	}
	public function create($project_id)
	{
    	$projects = $this->projectService->detail($project_id);
		return view('updates.create', ['project' => $project]);
	}
}
