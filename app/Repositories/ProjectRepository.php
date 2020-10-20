<?php
namespace App\Repositories;

use App\Projects;
use App\Options;

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
			->with('updates')
			->with('faqs')
			->with('options')
			->firstOrFail();
		return $project;
	}
	public function findByUser($user_id)
	{
		$project = Projects::where('user_id', $user_id)->get();
		return $project;
	}
	public function update($project_id,$update)
	{
		$project = Projects::where('id', $project_id);
		$project->update($update);
	}
	public function updateOption($option_id, $update)
	{
		$option = Options::where('id', $option_id);
		$option->update($update);
	}
	public function getOptionById($option_id)
	{
		$option = Options::where('id', $option_id)
			->with('project')
			->firstOrFail();
		return $option;
	}
}
