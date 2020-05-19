<?php
namespace App\Repositories;
use App\Projects;
class ProjectRepository
{
	public function all()
	{
		return Projects::all();
	}
	public function findById($project_id)
	{
		$project = Projects::where('id', $project_id)
			->with('donates')
			->with('user')
			->firstOrFail();
		return $project;
	}
	public function findByUser($user_id)
	{
		$project = Projects::where('user_id', $user_id)
			->all();
		return $project;
	}
}