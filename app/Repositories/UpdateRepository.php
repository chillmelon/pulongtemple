<?php
namespace App\Repositories;
use App\Updates;
class UpdateRepository
{
	public function findByProject($project_id)
	{
		$updates = Updates::where('project_id',$project_id)
			->get();
		return $donates;
	}
	public function create($update)
	{
		Updates::create($update);
	}
}

