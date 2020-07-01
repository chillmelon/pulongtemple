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
	public function show($id){
		$update = $this->updateService->show($id);
		$project = $this->projectService->format($update->project);
		$data=[
			'update' => $update,
			'project' => $project
		];
		return view('updates.view', $data);
	}
}
