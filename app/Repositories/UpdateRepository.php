<?php
namespace App\Repositories;
use App\Updates;

class UpdateRepository
{
	public function findById($id)
	{
		$update = Updates::where('id', $id)->first();
		return $update;
	}
	public function findByProject($project_id)
	{
		$updates = Updates::where('project_id',$project_id)->first()->with('project');
		return $donates;
	}
	public function create($update)
	{
		Updates::create($update);
	}
}
